<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::with('category')->get();
        
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $products = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
            'rating' => $request->rating,
        ]);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        // $products = Product::find($id);
        // ambil data product berdasarkan id
        $products = Product::where('id', $id)->with('category')->first();

        // ambil data brand dan category sebagai isian di pilihan (select)
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.edit', compact('products', 'brands', 'categories'));
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

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        // ambil data product berdasarkan id
        $product = Product::find($id);
        
        // hapus data product
        $product->delete();
        
        // redirect ke halaman product.index
        return redirect()->route('products.index');
    }
}
