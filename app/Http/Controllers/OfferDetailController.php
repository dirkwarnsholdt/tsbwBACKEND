<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferDetail;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class OfferDetailController extends Controller
{
    public function index($id)
    {
        return OfferDetail::where('offerid', $id)
            ->sortBy('title');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $offer_detail = OfferDetail::find($id);

        $offer_detail->edited_by = Auth::User()->id;
        $offer_detail->offerid = $request->input('offer');
        $offer_detail->update($request->all());

        uploadPicture(Input::file('file'), $offer_detail->id, "offer_detail");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return redirect('/#offer_detail');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $offer_detail = new OfferDetail;
        $offer_detail->title = $request->title;
        $offer_detail->content = $request->input('content');
        $offer_detail->edited_by = Auth::User()->id;
        $offer_detail->offerid = $request->offer;
        $offer_detail->save();

        uploadPicture(Input::file('file_0'), $offer_detail->id, "offer_detail");


        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/#offer_detail');

    }

    public function destroy($id)
    {
        $offer_detail = OfferDetail::find($id);
        deletePicture($offer_detail->id, "offer_detail");
        $offer_detail->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return redirect('/#offer_detail');
    }
}
