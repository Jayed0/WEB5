<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
    	$data['allData'] = Category::all();
    	return view('backend.category.view-category',$data);
    }

    public function add(){
    	return view('backend.category.add-category');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required'
    	]);
    	$category = new Category();
    	$category->name = $request->name;
    	$category->created_by = Auth::user()->id;
    	$category->created_by_name = Auth::user()->name;
    	$category->save();
    	return redirect()->route('categories.view')->with('success','Data Inserted Successfully.');
    }

    public function edit($id){
    	$editData = Category::find($id);
    	return view('backend.category.edit-category',compact('editData'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'name'=>'required'
    	]);
    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->updated_by = Auth::user()->id;
    	$category->updated_by_name = Auth::user()->name;
    	$category->save();
    	return redirect()->route('categories.view')->with('success','Data Updated Successfully.');
    }

    public function delete($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect()->route('categories.view')->with('success','Data Deleted Successfully.');
    }
}
