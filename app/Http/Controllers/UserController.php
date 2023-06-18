<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // mengambil data users beserta informasi role yang terkait dengan user.        
        $users = User::with('role')->get();
        // dd($users); //mengecek data variabel users
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [            
            'name' => 'required|string',
            'role' => 'required',
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
        
        $users = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {   
        // mengambil data dari User berdasarkan id        
        $users = User::find($id);

        // mengambil semua data dari Role
        $roles = Role::all();

        return view('user.edit', compact('users', 'roles'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect()->route('user.index');
    }

}
