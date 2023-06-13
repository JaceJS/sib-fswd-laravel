<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        // load data dari table sliders
        $sliders = Slider::all();

        // passing data sliders ke view slider.index
        return view('slider.index', compact('sliders'));
    }

    public function create()
    {
        // menampilkan halaman create
        return view('slider.create');
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
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {        
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);
        
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {        
        if ($request->hasFile('image')) {
            
            $old_image = Slider::find($id)->image;
            
            // menghapus file gambar yang lama
            Storage::delete('public/slider/'.$old_image);
            
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
        
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {        
        // ambil data product berdasarkan id
        $slider = Slider::find($id);
        
        // hapus data gambar dan product
        Storage::delete('public/slider/'.$slider->image);
        $slider->delete();

        return redirect()->route('slider.index');
    }
}
