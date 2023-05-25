<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index');
    }

    // public function login(){
    //     return view('users.login');
    // }

    // public function logout(){
    //     return view('users.logout');
    // }

    // public function create(){
    //     return view('users.create');
    // }

    // public function update(){
    //     return view('users.update');
    // }
}
