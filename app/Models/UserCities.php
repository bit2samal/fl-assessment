<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city', 'state', 'country', 'is_default'];

    public static function getCities(int $user_id): ?object
    {
        return UserCities::select('id', 'city', 'state', 'country')->where('user_id', $user_id)->get();
    }

    public static function getCity(int $city_id): ?object
    {
        return UserCities::select('id', 'city', 'state', 'country')->where('id', $city_id)->first();
    }

    public static function removeCity(int $user_id, int $city_id): int
    {
        return UserCities::where(['id' => $city_id, 'user_id' => $user_id])->delete();
    }
}
