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
        return $info = Info::orderBy('updated_at', 'desc')->get();
    }

    public function update(Request $request, $id)
    {
        $info = Info::find($id);

        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $info->edited_by = Auth::User()->id;
        $info->update($request->all());

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $info = new Info;
        $info->title = $request->title;
        $info->content = $request->content;
        $info->edited_by = Auth::User()->id;
        $info->save();

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return back();

    }

    public function destroy($id)
    {
        $info = Info::find($id);
        $info->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return back();
    }
}
