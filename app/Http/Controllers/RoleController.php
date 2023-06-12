<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    public function create()
    {        
        return view('role.create');
    }

    public function store(Request $request)
    {     
        $roles=Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }  

    public function edit($id)
    {
        $roles = Role::find($id);

        return view('role.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {     
        $roles=Role::find($id);

        $roles->delete();

        return redirect()->route('role.index');
    }
}
