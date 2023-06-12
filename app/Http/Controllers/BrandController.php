<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

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
        $brands = Brand::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('brand.index');
    }
    
    public function edit(Request $request, $id)
    {        
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
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

