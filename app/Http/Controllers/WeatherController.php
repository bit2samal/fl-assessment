<?php

namespace App\Http\Controllers;

use App\Http\ApiController;
use App\Models\UserCities;
use Illuminate\Http\Request;

use function App\Models\UserCities;

class WeatherController extends ApiController
{

    protected function prepareUrl(string $type = 'weather', string $city = '', string $state = '', string $country = '')
    {
        return env('WEATHER_API_URL') . "$type?q=$city,$state,$country&units=metric&appid=" . env('WEATHER_API_KEY');
    }

    public function weather(Request $request)
    {
        $location = UserCities::getCity($request->city_id);
        if (empty($location)) {
            return $this->jsonResponse(200, false, 'No location found');
        }

        $opts = [
            'http' => [
                'method' => "GET",
                'header' => "Accept: application/json\r\n"
            ]
        ];

        $context = stream_context_create($opts);
        $data = file_get_contents($this->prepareUrl(
            'weather',
            $location->city,
            $location->state,
            $location->country
        ), false, $context);

        return $this->jsonResponse(
            200,
            true,
            'success',
            json_decode($data)
        );
    }

    public function forecast(Request $request)
    {
        $location = UserCities::getCity($request->city_id);
        if (empty($location)) {
            return $this->jsonResponse(200, false, 'No location found');
        }

        $opts = [
            'http' => [
                'method' => "GET",
                'header' => "Accept: application/json\r\n"
            ]
        ];

        $context = stream_context_create($opts);
        $data = file_get_contents($this->prepareUrl(
            'forecast',
            $location->city,
            $location->state,
            $location->country
        ), false, $context);

        return $this->jsonResponse(
            200,
            true,
            'success',
            json_decode($data)
        );
    }
}
