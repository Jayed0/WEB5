<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SupplierController extends Controller
{
    public function view(){
    	$data['allData'] = Supplier::all();
    	return view('backend.supplier.view-supplier',$data);
    }

    public function add(){
    	return view('backend.supplier.add-supplier');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'mobile_no'=>'required',
    		'email'=>'required',
    		'address'=>'required'
    	]);
    	$supplier = new Supplier();
    	$supplier->name = $request->name;
    	$supplier->mobile_no = $request->mobile_no;
    	$supplier->email = $request->email;
    	$supplier->address = $request->address;
    	$supplier->created_by = Auth::user()->id;
    	$supplier->created_by_name = Auth::user()->name;
    	$supplier->save();
    	return redirect()->route('suppliers.view')->with('success','Data Inserted Successfully.');
    }

    public function edit($id){
    	$editData = Supplier::find($id);
    	return view('backend.supplier.edit-supplier',compact('editData'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'name'=>'required',
    		'mobile_no'=>'required',
    		'email'=>'required',
    		'address'=>'required'
    	]);
    	$supplier = Supplier::find($id);
    	$supplier->name = $request->name;
    	$supplier->mobile_no = $request->mobile_no;
    	$supplier->email = $request->email;
    	$supplier->address = $request->address;
    	$supplier->updated_by = Auth::user()->id;
    	$supplier->updated_by_name = Auth::user()->name;
    	$supplier->save();
    	return redirect()->route('suppliers.view')->with('success','Data Updated Successfully.');
    }

    public function delete($id){
    	$supplier = Supplier::find($id);
    	$supplier->delete();
    	return redirect()->route('suppliers.view')->with('success','Data Deleted Successfully.');
    }
}
