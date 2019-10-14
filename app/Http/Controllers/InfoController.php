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
        return $news = Info::orderBy('updated_at', 'desc')->get();
    }

    public function update(Request $request, Info $news)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $news->edited_by = Auth::User()->id;
        $news->update($request->all());

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $news = new Info;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->edited_by = Auth::User()->id;
        $news->save();

        uploadPicture(Input::file('file_0'), $news->id, "news");


        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return back();

    }

    public function destroy(Info $news)
    {
        deletePicture($news->id, "news");
        $news->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return back();
    }
}
