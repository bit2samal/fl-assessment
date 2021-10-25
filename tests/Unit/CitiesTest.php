<?php

namespace Tests\Unit;

use Tests\TestCase;

class CitiesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSaveCity()
    {
        $response = $this->post($this->api_url . 'add_city', [
            "city" => "Patiala",
            "state" => "Punjab",
            "country" => "India"
        ]);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('user_cities', [
            "city" => "Patiala",
            "state" => "Punjab",
            "country" => "India"
        ]);
    }
}
