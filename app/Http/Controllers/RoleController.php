<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3', // minimal name memiliki 3 huruf
        ]);

        // mengembalikan error jika data tidak valid
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        // memasukkan data name ke dalam Role
        $roles=Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }  

    public function edit($id)
    {
        // mengambil data Role berdasarkan id
        $roles = Role::find($id);

        return view('role.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        // update data role
        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {     
        // mengambil data Role berdasarkan id
        $roles=Role::find($id);

        // menghapus data berdasarkan id
        $roles->delete();

        return redirect()->route('role.index');
    }
}
