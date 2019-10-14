<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Illuminate\Support\Facades\Auth;
use Session;

class InfoController extends Controller
{
    public function index()
    {
        return $infos = Info::orderBy('updated_at', 'desc')->get();
    }

    public function update(Request $request, Info $infos)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $infos->edited_by = Auth::User()->id;
        $infos->update($request->all());

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $infos = new Info;
        $infos->title = $request->title;
        $infos->content = $request->content;
        $infos->edited_by = Auth::User()->id;
        $infos->save();

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return back();

    }

    public function destroy(Info $infos)
    {
        $infos->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return back();
    }
}
