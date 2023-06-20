<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function landing(){
        return view('landing');
    }

    public function dashboard(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $sliders = Slider::all();

        // mengambil jumlah
        $productCount = $products->count();
        $categoryCount = $categories->count();
        $brandCount = $brands->count();
        $sliderCount = $sliders->count();

        return view('dashboard', compact('productCount', 'categoryCount', 'brandCount', 'sliderCount'));
    }
}
