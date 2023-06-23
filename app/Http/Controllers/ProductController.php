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

    public function show($id)
    {
        $categories = Category::all();

        $product = Product::where('approve','1')->where('id', $id)->with('category')->first();

        // mengambil category yang sama
        $related = Product::where('approve','1')->where('category_id', $product->category->id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('product.show', compact('product', 'related', 'categories'));
        } else {
            abort(404);
        }

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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // mengembalikan error jika data tidak valid
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        if ($request->image) {
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
            return redirect()->route('product.index')->with('success', 'Product Succesfully Added.');
        }
        
        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,            
        ]);        

        return redirect()->route('product.index')->with('success', 'Product Succesfully Added.');
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
        if ($request->hasFile('image')){
            $old_image = Product::find($id)->image;
            // menghapus file gambar yang lama
            Storage::delete('public/product/'.$old_image);
            // ubah nama file gambar baru dengan angka random
            $imageName = time().'.'.$request->image->extension();

            Storage::putFileAs('public/product', $request->file('image'), $imageName);
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
                'rating' => $request->rating,
                'image' => $imageName,
            ]);
        } else {
            // Mengambil data product berdasarkan id
            $products = Product::find($id);        

            $products->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
                'rating' => $request->rating,
            ]);
        }
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // Mengambil data product berdasarkan id
        $product = Product::find($id);
        
        // hapus data gambar dan product berdasarkan id
        Storage::delete('public/product/'.$product->image);
        $product->delete();
                
        return redirect()->route('product.index');
    }

    public function approve($id)
    {
        // Mengambil data product berdasarkan id
        $product = Product::find($id);

        // update data product
        $product->update([
            'approve' => '1',
        ]);        

        // redirect ke halaman product.index
        return redirect()->back()->with('success', 'Product approved successfully.');
    }

    public function reject($id)
    {
        // Mengambil data product berdasarkan id
        $product = Product::find($id);

        // update data product
        $product->update([
            'approve' => '0',
        ]);

        // redirect ke halaman product.index
        return redirect()->back()->with('success', 'Product rejected successfully.');
    }
}
