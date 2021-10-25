<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $cats = Category::orderBy('id','desc')->get();
        return view('category',compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,name|max:50',
            'category_serial'=>'nullable|numeric',
            'category_image' => 'required|mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $file = $request['category_image'];
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name = 'category-' . date('YmdHis') . '.' . $ext;
        $file->storeAs('category_photo', $file_full_name, 'public');

        Category::firstOrCreate([
            'name' => $request->category_name,
            'order' => $request->category_serial,
            'photo' => $file_full_name,
        ]);
        return redirect()->back()->with('notification','New category is added successfully!');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'update_category_name' => 'required|max:50|unique:categories,name,'.$id.',id',
            'update_category_serial'=>'nullable|numeric',
            'update_status'=>'required',
            'update_category_image' => 'mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $cat = Category::find($id);
        $file_full_name = $cat->photo;

        if(isset($request['update_category_image']))
        {
            Storage::delete('/public/category_photo/'.$file_full_name);

            $file = $request['update_category_image'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = 'category-' . date('YmdHis') . '.' . $ext;
            $file->storeAs('category_photo', $file_full_name, 'public');
        }

        $cat->update([
            'name' => $request->update_category_name,
            'order' => $request->update_category_serial,
            'status' => $request->update_status,
            'photo' => $file_full_name,
        ]);
        return redirect()->back()->with('notification','Category is updated successfully!');
    }

    public function delete($id)
    {
        try {
            $cat = Category::find($id);
            Storage::delete('/public/category_photo/'.$cat['photo']);
            $cat->delete();
            return redirect()->back()->with('notification','Category is deleted successfully!');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('notification','Category is not deleted!');
        }
    }
}
