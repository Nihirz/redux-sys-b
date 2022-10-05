<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\AdminCategory;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $data['AdminCategory'] = AdminCategory::orderBy('id','asc')->paginate(25);   
        return view('AdminCategory',$data);
    }
    public function add()
    {
        return view('AddAdminCategory');
    }
    public function store(Request $request)
    {
        if (AdminCategory::find($request->id)) {
            session()->flash('warning', 'Already in system.');
            return redirect()->back();
        }
        else
        {
        $category = new AdminCategory();
        $category->cat_name =$request->post('cat_name');
        $category->save();    
        return redirect()->back();
        }
    
    }
    
    public function edit($id)
    {
        $category=AdminCategory::where('id',$id)->first();
        return view('editAdmincategory',compact('category'));
    }
    public function update(Request $request)
    {
        $category =AdminCategory::find($request->id);
        $category->cat_name=$request->input('cat_name');
        $category->save();
        return redirect()->route('admin.category')->with('success', 'edit product Updated Successfully!');
    }
    public function delete($id)
    {
        $category = AdminCategory::where('id',$id)->delete();
        return redirect()->back();
    }
}
