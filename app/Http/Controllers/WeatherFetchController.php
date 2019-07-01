<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

use App\Http\Requests;

class WeatherFetchController extends Controller
{
    public function index() {
        $url = 'http://api.openweathermap.org/data/2.5/weather?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
        $json = file_get_contents($url);
        return $json;
        return Weather::all();
    }

    public function store($json) {
        $weatherData = new Weather;
        $weatherData->content = $json




        $this->validate($request, array(
            'title' => 'required|max:255',
        ));

        $offer = new offer;
        $offer->title = $request->title;
        $offer->save();

        uploadPicture(Input::file('file_0'), $offer->id, "offer");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/#offer');
    }

    public function update() {

    }
}
