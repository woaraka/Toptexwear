<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $cats = Category::where('status',1)->get();
        $sub_cats = SubCategory::where('status',1)->get();
        $products = Product::orderBy('id','desc')->get();
        return view('product',compact('cats','sub_cats','products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'nullable',
            'product_name' => 'required|max:50',
            'product_code' => 'required|unique:products,code|max:50',
            'product_description' => 'required',
            'product_size' => 'nullable|max:50',
            'product_color' => 'nullable|max:50',
            'product_asking_price' => 'nullable|numeric',
            'product_selling_price' => 'nullable|numeric',
            'product_image1' => 'required|mimes:jpeg,jpg,bmp,png|max:5000',
            'product_image2' => 'mimes:jpeg,jpg,bmp,png|max:5000',
            'product_image3' => 'mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $date = date('YmdHis');
        $file = $request['product_image1'];
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name1 = 'product-' . $date . '-1.' . $ext;
        $file->storeAs('product_photo', $file_full_name1, 'public');

        $file_full_name2 =null;
        if(isset($request['product_image2']))
        {
            $file = $request['product_image2'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name2 = 'product-' . $date . '-2.' . $ext;
            $file->storeAs('product_photo', $file_full_name2, 'public');
        }

        $file_full_name3 =null;
        if(isset($request['product_image3']))
        {
            $file = $request['product_image3'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name3 = 'product-' . $date . '-3.' . $ext;
            $file->storeAs('product_photo', $file_full_name3, 'public');
        }

        Product::firstOrCreate([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'name' => $request->product_name,
            'code' => $request->product_code,
            'description' => $request->product_description,
            'size' => $request->product_size,
            'color' => $request->product_color,
            'asking' => $request->product_asking_price,
            'selling' => $request->product_selling_price,
            'photo1' => $file_full_name1,
            'photo2' => $file_full_name2,
            'photo3' => $file_full_name3,
        ]);
        return redirect()->back()->with('notification','New product is added successfully!');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'update_product_code' => 'required|max:50|unique:products,code,'.$id.',id',
            'update_product_name' => 'required|max:50',
            'update_product_description' => 'required',
            'update_product_size' => 'nullable',
            'update_product_color' => 'nullable',
            'update_product_asking_price' => 'nullable|numeric',
            'update_product_selling_price' => 'nullable|numeric',
            'update_fetcher' => 'required',
            'update_latest' => 'required',
            'update_stock' => 'required',
            'update_status' => 'required',
            'update_product_image1' => 'mimes:jpeg,jpg,bmp,png|max:5000',
            'update_product_image2' => 'mimes:jpeg,jpg,bmp,png|max:5000',
            'update_product_image3' => 'mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $product = Product::find($id);

        $file_full_name1 = $product->photo1;
        $file_full_name2 = $product->photo2;
        $file_full_name3 = $product->photo3;

        $date = date('YmdHis');

        if(isset($request['update_product_image1']))
        {
            if($file_full_name1)
            {
                Storage::delete('/public/product_photo/'.$file_full_name1);
            }
            $file = $request['update_product_image1'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name1 = 'product-' . $date . '-1.' . $ext;
            $file->storeAs('product_photo', $file_full_name1, 'public');
        }

        if(isset($request['update_product_image2']))
        {
            if($file_full_name2)
            {
                Storage::delete('/public/product_photo/'.$file_full_name2);
            }
            $file = $request['update_product_image2'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name2 = 'product-' . $date . '-2.' . $ext;
            $file->storeAs('product_photo', $file_full_name2, 'public');
        }

        if(isset($request['update_product_image3']))
        {
            if($file_full_name3)
            {
                Storage::delete('/public/product_photo/'.$file_full_name3);
            }
            $file = $request['update_product_image3'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name3 = 'product-' . $date . '-3.' . $ext;
            $file->storeAs('product_photo', $file_full_name3, 'public');
        }
        $product->update([
            'name' => $request->update_product_name,
            'code' => $request->update_product_code,
            'description' => $request->update_product_description,
            'size' => $request->update_product_size,
            'color' => $request->update_product_color,
            'asking' => $request->update_product_asking_price,
            'selling' => $request->update_product_selling_price,
            'fetcher' => $request->update_fetcher,
            'latest' => $request->update_latest,
            'stock' => $request->update_stock,
            'status' => $request->update_status,
            'photo1' => $file_full_name1,
            'photo2' => $file_full_name2,
            'photo3' => $file_full_name3,
        ]);
        return redirect()->back()->with('notification','Product is updated successfully!');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $file_full_name1 = $product->photo1;
        $file_full_name2 = $product->photo2;
        $file_full_name3 = $product->photo3;

        if($file_full_name1)
        {
            Storage::delete('/public/product_photo/'.$file_full_name1);
        }
        if($file_full_name2)
        {
            Storage::delete('/public/product_photo/'.$file_full_name2);
        }
        if($file_full_name3)
        {
            Storage::delete('/public/product_photo/'.$file_full_name3);
        }

        $product->delete();
        return redirect()->back()->with('notification','Product is deleted successfully!');
    }
}
