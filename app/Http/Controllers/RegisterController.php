<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        // mengambil data category
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [            
            'name' => 'required|string',            
            'email' => 'required|email',
            'password' => 'required|min:8',                     
            'phone' => 'required|digits_between:10,12',
        ]);

        // mengembalikan error jika data tidak valid
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $user = User::create([
            'role_id'=> 3, // mengisi role_id dengan nama customer
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);        

        return redirect()->route('login.index');
    }
}
