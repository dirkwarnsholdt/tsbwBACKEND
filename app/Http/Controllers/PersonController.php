<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class PersonController extends Controller
{
    public function index()
    {
        return $person = Person::orderBy('title')->get();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $person = Person::find($id);

        $person->edited_by = Auth::User()->id;
        $person->update($request->all());

        uploadPicture(Input::file('file'), $person->id, "person");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return redirect('/#person');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $person = new Person;
        $person->title = $request->title;
        $person->content = $request->content;
        $person->edited_by = Auth::User()->id;
        $person->save();

        uploadPicture(Input::file('file_0'), $person->id, "person");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/#person');

    }

    public function destroy($id)
    {
        $person = Person::find($id);
        deletePicture($person->id, "person");
        $person->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return redirect('/#person');
    }
}
