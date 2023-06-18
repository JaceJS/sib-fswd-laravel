<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);                    

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate(); // meregenerate session baru untuk keamanan            
            return redirect()->intended('dashboard');
        }                
        return back()->with('loginError', 'Invalid email ord password');               
    }

    public function logout(Request $request)
        {
            Auth::logout();        
            $request->session()->invalidate();        
            $request->session()->regenerateToken();        

            return redirect('/');
        }
}
