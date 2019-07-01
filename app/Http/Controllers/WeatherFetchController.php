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

    public function store($request) {
        $weatherData = new Weather;
        $weatherData->content = $request->content;
        $weatherData->save();
    }

    public function update($request, $weatherData) {
        $weatherData->update($request->all());
    }
}