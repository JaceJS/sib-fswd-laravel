<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {        
        $brands = Brand::all();
        
        return view('brands.index', compact('brands'));
    }
    
    public function create()
    {        
        return view('brands.create');
    }

    public function store(Request $request)
    {        
        $brands = Brand::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('brands.index');
    }
    
    public function edit(Request $request, $id)
    {        
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $brands = Brand::find($id);
        
        return view('brands.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {        
        Brand::where('id', $id)->update([
            'name' => $request->name,
        ]);
        
        return redirect()->route('brands.index');
    }
    
    public function destroy($id)
    {        
        $brands = Brand::find($id);        

        $brands->delete();
        
        return redirect()->route('brands.index');
    }
}

