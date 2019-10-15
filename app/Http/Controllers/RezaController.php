<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Contracts\Routing\ResponseFactory;

class RezaController extends Controller
{
    // ++++++++++++++++++++++++++
    // GETTERS FOR CONTENT
    // ++++++++++++++++++++++++++
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

    // ++++++++++++++++++++++++++
    // GETTERS FOR ILLUSTRATIONS
    // ++++++++++++++++++++++++++
    public function giveFirstImage() {
        try {
            return response()->file(public_path('reza/img/_1.png'));
        } catch (Exception $e) {}

        return;
    }

    public function giveSecondImage() {
        try {
            return response()->file(public_path('reza/img/_2.png'));
        } catch (Exception $e) {}

        return;
    }

    public function giveThirdImage() {
        try {
            return response()->file(public_path('reza/img/_3.png'));
        } catch (Exception $e) {}

        return;
    }

    public function giveFourthImage() {
        try {
            return response()->file(public_path('reza/img/_4.png'));
        } catch (Exception $e) {}

        return;
    }

    public function giveFifthImage() {
        try {
            return response()->file(public_path('reza/img/_5.png'));
        } catch (Exception $e) {}

        return;
    }
}
