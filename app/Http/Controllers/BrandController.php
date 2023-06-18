<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {        
        $brands = Brand::all();
        
        return view('brand.index', compact('brands'));
    }
    
    public function create()
    {        
        return view('brand.create');
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

        // memasukkan data name ke dalam Brand
        $brands = Brand::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('brand.index');
    }
    
    public function edit(Request $request, $id)
    {        
        // mengambil data Brand berdasarkan id
        $brands = Brand::find($id);
        
        return view('brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {        
        Brand::where('id', $id)->update([
            'name' => $request->name,
        ]);
        
        return redirect()->route('brand.index');
    }
    
    public function destroy($id)
    {        
        $brands = Brand::find($id);        

        $brands->delete();
        
        return redirect()->route('brand.index');
    }
}

