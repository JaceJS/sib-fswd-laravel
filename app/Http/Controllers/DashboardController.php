<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function landing(){
        return view('landing');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
