<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

use App\Http\Requests;

class WeatherFetchController extends Controller
{
    public function index() {
        return Weather::all();
    }

    public function store($json) {
        $weatherData = new Weather;
        $weatherData->content = $json;
        $weatherData->save();
    }

    public function update() {

    }
}
