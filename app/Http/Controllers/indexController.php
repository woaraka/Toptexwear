<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Mail\ConntactEmail;
use App\MainSlider;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    public function index()
    {
        $sliders = MainSlider::all();
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        $clients = Client::where('status',1)->get();
        $products = Product::where('status',1)->where('fetcher',1)->orWhere('latest',1)->get();
        return view('welcome',compact('sliders','cates','tops','clients','products'));
    }
    public function contact()
    {
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        return view('contact',compact('cates','tops'));
    }

    public function about()
    {
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        return view('about',compact('cates','tops'));
    }

    public function product_show(Product $id)
    {
        //dump($id);
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        $relates = Product::where('sub_category_id',$id->sub_category_id)->where('id','!=',$id->id)->where('status',1)->orderBy('id','desc')->limit(5)->get();
        return view('product_show',compact('cates','tops','id','relates'));
    }

    public function product_category($id)
    {
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        $products = Product::where('category_id',$id)->where('status',1)->orderBy('id','desc')->Paginate(9);
        $fetchers = Product::where('fetcher',1)->where('status',1)->orderBy('id','desc')->get();
        $subcates = SubCategory::where('category_id',$id)->where('status',1)->get();
        $catess = Category::find($id);
        //dump($fetchers);
        return view('cate_product_show',compact('cates','tops','products','fetchers','subcates','catess'));
    }

    public function product_sub_category($id)
    {
        $cates = Category::where('status',1)->get();
        $tops = SubCategory::where('category_id', 1)->where('status',1)->get();
        $products = Product::where('sub_category_id',$id)->where('status',1)->orderBy('id','desc')->Paginate(9);
        $fetchers = Product::where('fetcher',1)->where('status',1)->orderBy('id','desc')->get();
        $sub_cates = SubCategory::find($id);
        $catess = Category::find($sub_cates->category_id);
        //dump($fetchers);
        return view('sub_cate_product_show',compact('id','cates','tops','products','fetchers','catess'));
    }

    public function contact_store(Request $request)
    {
        if($request->name != null && $request->phone && $request->reason && $request->message)
        {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'purpose' => $request->reason,
                'message' => $request->message,
            );
            $mail = Mail::to('toptexwear@gmail.com')->send(new ConntactEmail($data));
            return response()->json("Your message is submitted successfully!");
        }
        else
        {
            return response()->json("Message submission was unsuccessful!");
        }
    }
}
