<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
         return view('admin.category',compact('data'));
    }
    public function addCategory(Request$request)
    {
        $category=new Category();
        $category->Category_Name=$request->name;
        $category->save();
        return redirect()->back()->with('message','Category added successfully');
    }
    public function deleteCategory($id)
    {
        $data=Category::find($id);
        $data->delete();
         return redirect()->back()->with(['message','category deleted successfully']);
    }

}
