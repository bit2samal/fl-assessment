<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city', 'is_default'];

    public static function getCities(int $user_id): object
    {
        return UserCities::select('id', 'city')->where('user_id', $user_id)->get();
    }

    public static function removeCity(int $user_id, int $city_id): int
    {
        return UserCities::where(['id' => $city_id, 'user_id' => $user_id])->delete();
    }
}
