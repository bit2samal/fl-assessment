<?php

namespace App\Http\Controllers;

use App\Http\ApiController;
use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserCitiesController extends ApiController
{
    public function saveCity(Request $request): JsonResponse
    {
        $message = UserCities::firstOrCreate([
                                                 'user_id' => 1,
                                                 'city' => $request->input('city'),
                                                 'state' => $request->input('state'),
                                                 'country' => $request->input('country')
                                             ])
            ? "City saved" : "Unable to save city";

        return $this->jsonResponse(200, true, $message, ['city' => $request->input('city')]);
    }

    public function getCities(): JsonResponse
    {
        return $this->jsonResponse(
            200,
            true,
            'success',
            UserCities::getCities(1)
        );
    }

    public function removeCity(Request $request): JsonResponse
    {
        $message = UserCities::removeCity(1, $request->city_id)
            ? 'City removed' : 'Unable to remove city';

        return $this->jsonResponse(
            200,
            true,
            $message
        );
    }
}
