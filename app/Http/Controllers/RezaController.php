<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Contracts\Routing\ResponseFactory;

class RezaController extends Controller
{
    public function giveFirst() {
        try {
            return response()->file(public_path('reza/_1.pdf'));
        } catch (Exception $e) {}

        return;
    }

    public function giveSecond() {
        try {
            return response()->file(public_path('reza/_2.pdf'));
        } catch (Exception $e) {}

        return;
    }

    public function giveThird() {
        try {
            return response()->file(public_path('reza/_3.pdf'));
        } catch (Exception $e) {}

        return;
    }

    public function giveFourth() {
        try {
            return response()->file(public_path('reza/_4.pdf'));
        } catch (Exception $e) {}

        return;
    }

    public function giveFifth() {
        try {
            return response()->file(public_path('reza/_5.pdf'));
        } catch (Exception $e) {}

        return;
    }
}
