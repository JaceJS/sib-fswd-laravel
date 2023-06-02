<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        // mengambil data users beserta informasi role yang terkait dengan user.        
        $users = User::with('role')->get();
        // dd($users); //mengecek data variabel users
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        
        $users = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {   
        // mengambil data dari User berdasarkan id        
        $users = User::find($id);

        // mengambil semua data dari Role
        $roles = Role::all();

        return view('users.edit', compact('users', 'roles'));
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

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect()->route('users.index');
    }

}
