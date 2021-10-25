<?php

namespace App\Http\Controllers;

use App\Category;
use App\MainSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = MainSlider::all();
        return view('image-slider',compact('sliders'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'update_slider_image' => 'required|mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $slider = MainSlider::find($id);
        $file_full_name = $slider->photo;
        Storage::delete('/public/slider_photo/'.$file_full_name);

        $file = $request['update_slider_image'];
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name = 'slider-' . date('YmdHis') . '.' . $ext;
        $file->storeAs('slider_photo', $file_full_name, 'public');

        $slider->update([
            'photo' => $file_full_name,
        ]);
        return redirect()->back()->with('notification','Slider Image is updated successfully!');
    }
}
