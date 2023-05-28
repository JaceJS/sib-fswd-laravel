<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    public function create(){        
        return view('roles.create');
    }

    public function store(Request $request){ 
        
        $roles=Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }  

    public function edit(){
        return view('roles.create');
    }

    public function destroy($id){ 
        
        $roles=Role::find($id);

        $roles->delete();

        return redirect()->route('roles.index');
    }
}
