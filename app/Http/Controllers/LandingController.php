<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::all();
        $categories = Category::all();

        return view('landing', compact('sliders', 'products', 'categories'));
    }
}
