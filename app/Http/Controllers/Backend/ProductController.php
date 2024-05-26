<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;

class ProductController extends Controller
{
    public function view(){
    	$data['allData'] = Product::all();
    	return view('backend.product.view-product',$data);
    }

    public function add(){
    	$data['suppliers'] = Supplier::all();
    	$data['units'] = Unit::all();
    	$data['categories'] = Category::all();
    	return view('backend.product.add-product',$data);
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'supplier_id'=>'required',
    		'unit_id'=>'required',
    		'category_id'=>'required',
    		'name'=>'required'
    	]);
    	$product = new Product();
    	$product->supplier_id = $request->supplier_id;
    	$product->unit_id = $request->unit_id;
    	$product->category_id = $request->category_id;
    	$product->name = $request->name;
    	$product->quantity = '0';
    	$product->created_by = Auth::user()->id;
    	$product->created_by_name = Auth::user()->name;
    	$product->save();
    	return redirect()->route('products.view')->with('success','Data Inserted Successfully.');
    }

    public function edit($id){
    	$data['editData'] = Product::find($id);
    	$data['suppliers'] = Supplier::all();
    	$data['units'] = Unit::all();
    	$data['categories'] = Category::all();
    	return view('backend.product.edit-product',$data);
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'supplier_id'=>'required',
    		'unit_id'=>'required',
    		'category_id'=>'required',
    		'name'=>'required'
    	]);
    	$product = Product::find($id);
    	$product->supplier_id = $request->supplier_id;
    	$product->unit_id = $request->unit_id;
    	$product->category_id = $request->category_id;
    	$product->name = $request->name;
    	$product->updated_by = Auth::user()->id;
    	$product->updated_by_name = Auth::user()->name;
    	$product->save();
    	return redirect()->route('products.view')->with('success','Data Updated Successfully.');
    }

    public function delete($id){
    	$product = Product::find($id);
    	$product->delete();
    	return redirect()->route('products.view')->with('success','Data Deleted Successfully.');
    }
}
