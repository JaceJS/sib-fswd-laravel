<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::with('category')->get();
        
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $imageName = time() . '.' . $request->image->extension();

        // simpan file ke folder public/product
        Storage::putFileAs('public/product', $request->image, $imageName);

        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
            'image' => $imageName,
        ]);        

        return redirect()->route('product.index')->with('success', 'Product Berhasil Ditambahkan.');
    }

    public function edit($id)
    {                
        $products = Product::where('id', $id)->with('category')->first();
        
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.edit', compact('products', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);        

        $products->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
            'rating' => $request->rating,
        ]);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // ambil data product berdasarkan id
        $product = Product::find($id);
        
        // hapus data product
        $product->delete();
        
        // redirect ke halaman product.index
        return redirect()->route('product.index');
    }
}
