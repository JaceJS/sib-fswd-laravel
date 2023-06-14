<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // mengambil semua data dari category
        $categories = Category::all();

        // mengambil data slider dengan approve = 1
        $sliders = Slider::where('approve', '1')->get();                

        if ($request->category) {
            $products = Product::where('approve', 1)->with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            })->get();
        } else if ($request->min && $request->max) {
            $products = Product::where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
        } else {
            // mengambil 8 data produk secara acak
            $products = Product::where('approve', 1)->inRandomOrder()->limit(8)->get();
        }

        return view('landing', compact('sliders', 'products', 'categories'));
    }
}
