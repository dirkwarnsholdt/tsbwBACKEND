<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class MenuController extends Controller
{
    public function index()
    {
    	$menu = Menu::all();
        $Woche = array();
        foreach ($menu as $one_menu) {
            if (date("W") == date("W", strtotime($one_menu->date)))
                array_push($Woche, $one_menu);
        }

        return $Woche;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'vollkost' => 'required'
        ));

        $menu = Menu::find($id);

        $menu->update($request->all());
        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return redirect('/#menu');
    }

    public function store(Request $request)
    {
        $id = $request->id;

        $this->validate($request, array(
            'vollkost' => 'required'
        ));

        $menu = new Menu;
        $menu->vollkost = $request->vollkost;
        $menu->vegetarisch = $request->vegetarisch;
        $menu->fitness = $request->fitness;
        $menu->nachtisch = $request->nachtisch;
        $menu->date = $request->date;
        $menu->save();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return redirect('/#menu');

    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return redirect('/#menu');
    }

    public function giveAll()
    {
    	return Menu::all();
    }

    public function giveCALENDAR()
    {
        $menu = Menu::all();
        $Calendar = array();
        foreach ($menu as $one_menu) {
            if (date("W") > 4) {
                if (date("W") - 3 <= date("W", strtotime($one_menu->date))) {
                    array_push($Calendar, $one_menu);
                }
            }
            else {
                if ((date("n") == date("n", strtotime($one_menu->date)))) {
                    array_push($Calendar, $one_menu);
                }
            }
        }

        return $Calendar;
    }
}
