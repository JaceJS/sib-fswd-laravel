<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function index()
    {
        // load data dari table sliders
        $sliders = Slider::all();

        // passing data sliders ke view slider.index
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        // menampilkan halaman create
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        // ubah nama file gambar dengan angka random
        $imageName = time().'.'.$request->image->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/slider', $request->file('image'), $imageName);

        // insert data ke table sliders
        $slider = Slider::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'image' => $imageName,
        ]);

        // alihkan halaman ke halaman slider.index
        return redirect()->route('sliders.index');
    }

    public function edit($id)
    {        
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);
        
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {        
        if ($request->hasFile('image')) {
            
            $old_image = Slider::find($id)->image;
                        
            Storage::delete('public/slider/'.$old_image);

            // FILE BARU //
            // ubah nama file gambar baru dengan angka random
            $imageName = time().'.'.$request->image->extension();

            Storage::putFileAs('public/slider', $request->file('image'), $imageName);
            
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'caption' => $request->caption,
                'image' => $imageName,
            ]);
            
        } else {            
            // update data sliders hnaya untuk title dan caption
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'caption' => $request->caption,
            ]);
        }
        
        return redirect()->route('sliders.index');
    }

    public function destroy($id)
    {        
        $slider = Slider::find($id);
        
        Storage::delete('public/slider/'.$slider->image);

        $slider->delete();

        return redirect()->route('sliders.index');
    }
}
