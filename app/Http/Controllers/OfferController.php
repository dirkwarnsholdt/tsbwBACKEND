<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\OfferDetail;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Redirect;

class OfferController extends Controller
{
    public function index()
    {
        return Offer::all();
    }

    public function update(Request $request, offer $offer)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));

        $offer->update($request->all());

        uploadPicture(Input::file('file'), $offer->id, "offer");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return redirect('/#offer');
    }

    public function store(Request $request)
    {
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

    public function destroy(Offer $offer)
    {
        $hasError = false;
        try {
            deletePicture($offer->id, "offer");
            $offer->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            $hasError = !$hasError;
            Session::flash('error', 'Der Eintrag wurde nicht gelöscht. Es gibt noch verknüpfte Angebote zu dieser Überschrift!');
            return redirect('/');
        }
        if (!$hasError) {
            Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
            return redirect('/#offer');
        }
    }
}
