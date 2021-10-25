<?php

namespace App\Http\Controllers;

use App\Category;
use App\MainSlider;
use App\Product;
use App\SubCategory;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $category = Category::all()->count();
        $sub_category = SubCategory::all()->count();
        $product = Product::all()->count();
        $client = Client::all()->count();
        $slider = MainSlider::all()->count();
        $path = public_path('storage/product_photo');
        $files = count(File::files($path));
        //dump($files);
        return view('home',compact('category','sub_category','product','client','slider','files'));
    }
}
