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
        $json = json_decode($fetch, true);
        echo("return: ". $json['wind']['speed']);

        // return $weatherData = Weather::all
    }

    public function giveToday() {
        $path = '/var/www/html/tsbwAPP/public/weather/';
        try {
            if (file_get_contents($path . 'weatherToday.json')) {
                $json = file_get_contents($path . 'weatherToday-TEMP.json');
            } else {
                $json = file_get_contents($path . 'weatherToday.json');
            }
        } catch (Exception $e) {
            // idk what I should do now xd
        }

    }

    public function storeToday() {
        // initial dl of .json
    }

    public function updateToday() {
        // download new -> then delete other
        // everyTenMin -> fetch new /weatherToday
        return;
    }
}
