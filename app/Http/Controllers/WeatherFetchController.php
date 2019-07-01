<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

use App\Http\Requests;

class WeatherFetchController extends Controller
{
    public function index() {
        $url = 'http://api.openweathermap.org/data/2.5/weather?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
        $fetch = file_get_contents($url);
        $json = json_decode($fetch)

        return $json

        // return $weatherData = Weather::orderBy('updated_at', 'desc')
        //     ->get();
    }

    public function store($request) {
        $weatherData = new Weather;
        $weatherData->content = $request->content;
        $weatherData->save();

        return;
    }

    public function update(Request $request, Weather $weatherData) {
        $weatherData->update($request->all());

        return;
    }
}
