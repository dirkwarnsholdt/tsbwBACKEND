<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class changePasswordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
}
