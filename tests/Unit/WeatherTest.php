<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\UserCities;

class WeatherTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_weather()
    {
        $city = UserCities::first('id');
        $resonse = $this->get($this->api_url . "weather/$city->id");
        $resonse->assertStatus(200)
        ->assertJson(['success'=>true]);
    }

    public function test_forcast()
    {
        $city = UserCities::first('id');
        $resonse = $this->get($this->api_url . "forecast/$city->id");
        $resonse->assertStatus(200)
        ->assertJson(['success'=>true]);
    }
}
