<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $sub_cats = SubCategory::orderBy('id','desc')->get();
        return view('sub_category',compact('cats','sub_cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category_name' => 'required|max:50',
        ]);

        SubCategory::firstOrCreate([
            'category_id' => $request->category,
            'name' => $request->sub_category_name,
        ]);
        return redirect()->back()->with('notification','New sub-category is added successfully!');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'update_category' => 'required',
            'update_sub_category_name' => 'required|max:50',
            'update_status'=>'required',
        ]);

        $sub_cat = SubCategory::find($id);

        $sub_cat->update([
            'category_id' => $request->update_category,
            'name' => $request->update_sub_category_name,
            'status' => $request->update_status,
        ]);
        return redirect()->back()->with('notification','Sub-category is updated successfully!');
    }

    public function delete($id)
    {
        try {
            $sub_cat = SubCategory::find($id);
            $sub_cat->delete();
            return redirect()->back()->with('notification','Sub-category is deleted successfully!');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()->back()->with('notification','Sub-category is not deleted!');
        }
    }
}
