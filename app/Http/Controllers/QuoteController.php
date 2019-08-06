<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

use App\Http\Requests;

class QuoteController extends Controller
{
\public\quotes\quotes.js
    public function giveAll() {
        $path = '/var/www/html/tsbwAPP/public/quotes/';
        try {
            $json = file_get_contents($path . 'quotes.js')
        } catch (Exception $e) {

        }
        return $json;
    }
}
