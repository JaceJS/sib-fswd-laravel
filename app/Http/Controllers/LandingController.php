<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // mengambil semua data dari category
        $categories = Category::all();

        // mengambil data slider dengan approve = 1
        $sliders = Slider::where('approve', '1')->get();                

        // mengambil nilai harga min dan max      
        Session::put('old_min', $request->min);
        Session::put('old_max', $request->max);

        if ($request->min == '0' && $request->max == '0') {  
            $products = collect(); // membuat koleksi kosong jika nilai min dan max adalah 0
        } else if($request->min && $request->max) {
            $products = Product::where('approve', '1')->whereBetween('price', [$request->min, $request->max])->limit(8)->get();        
        } else if($request->min == '0' && $request->max) { 
            $products = Product::where('approve', '1')->whereBetween('price', [$request->min, $request->max])->limit(8)->get();
        } else if($request->min && $request->max == '0') { 
            $products = Product::where('approve', '1')->whereBetween('price', [$request->min, $request->max])->limit(8)->get();
        } else if($request->min) {
            $products = Product::where('price', '>=', $request->min)->where('approve', '1')->limit(8)->get();                        
        } else if($request->min == '0') { 
            $products = Product::where('price', '>=', $request->min)->where('approve', '1')->limit(8)->get();
        } else if($request->max) { 
            $products = Product::where('price', '<=', $request->max)->where('approve', '1')->limit(8)->get();
        } else if($request->max == '0') { 
            $products = Product::where('price', '<=', $request->max)->where('approve', '1')->limit(8)->get();
        } else {                                            
            $products = Product::where('approve', 1)->inRandomOrder()->limit(8)->get(); // mengambil produk secara acak dengan batas 8 produk      
        }        
        return view('landing', compact('sliders', 'products', 'categories'));
    }

    public function show($id){
        // mengambil data slider dengan approve = 1
        $sliders = Slider::where('approve', '1')->get();

        // mengambil semua data dari category
        $categories = Category::all();

        // mengambil data kategori berdasarkan id
        $categories_id = Category::find($id);
        
        $products = Product::where('approve', 1)
                ->where('category_id', $categories_id->id)
                ->with('category')                
                ->get();

        return view('landing', compact('categories', 'categories_id', 'products', 'sliders'));        
    }

    public function about(){
        // mengambil semua data dari category
        $categories = Category::all();

        return view('about', compact('categories'));
    }

    public function contact(){
        // mengambil semua data dari category
        $categories = Category::all();

        return view('contact', compact('categories'));
    }
}
