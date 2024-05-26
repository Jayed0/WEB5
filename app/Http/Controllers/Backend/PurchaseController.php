<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use DB;
use PDF;

class PurchaseController extends Controller
{
    public function view(){
    	$data['allData'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
    	return view('backend.purchase.view-purchase',$data);
    }

    public function add(){
    	$data['suppliers'] = Supplier::all();
    	$data['units'] = Unit::all();
    	$data['categories'] = Category::all();
    	return view('backend.purchase.add-purchase',$data);
    }

    public function store(Request $request){
    	if ($request->category_id == null) {
    		return redirect()->back()->with('error','Sorry! you do not select any item.');
    	}else{
    		$count_category = count($request->category_id);
    		for ($i=0; $i < $count_category ; $i++) { 
    			$purchase = new Purchase();
    			$purchase->date = date('Y-m-d',strtotime($request->date[$i]));
    			$purchase->purchase_no = $request->purchase_no[$i];
    			$purchase->supplier_id = $request->supplier_id[$i];
		    	$purchase->category_id = $request->category_id[$i];
		    	$purchase->product_id = $request->product_id[$i];
		    	$purchase->buying_qty = $request->buying_qty[$i];
		    	$purchase->unit_price = $request->unit_price[$i];
		    	$purchase->buying_price = $request->buying_price[$i];
		    	$purchase->description = $request->description[$i];
		    	$purchase->created_by = Auth::user()->id;
		    	$purchase->created_by_name = Auth::user()->name;
		    	$purchase->status = '0';
		    	$purchase->save();
    		}
    	}

    	return redirect()->route('purchase.view')->with('success','Data Inserted Successfully.');
    }

    public function delete($id){
    	$purchase = Purchase::find($id);
    	$purchase->delete();
    	return redirect()->route('purchase.view')->with('success','Data Deleted Successfully.');
    }

    public function pendingList(){
    	$data['allData'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
    	return view('backend.purchase.view-pending-list',$data);
    }

    public function approve($id){
    	$purchase = Purchase::find($id);
    	$product = Product::where('id',$purchase->product_id)->first();
    	$purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
    	$product->quantity = $purchase_qty;
    	if ($product->save()) {
    		DB::table('purchases')
    		->where('id',$id)
    		->update(['status' => 1, 'updated_by' => Auth::user()->id, 'updated_by_name' => Auth::user()->name]);
    	}

    	return redirect()->route('purchase.pending.list')->with('success','Data approved Successfully.');
    }

    public function purchaseReport(){
        return view('backend.purchase.daily-purchase-report');
    }

    public function purchaseReportPdf(Request $request){
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->orderBy('supplier_id')->orderBy('category_id')->orderBy('product_id')->orderBy('date')->get();
        $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d',strtotime($request->end_date));
        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierProductWisePurchase(){
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        return view('backend.purchase.supplier-product-wise-purchase-report',$data);
    }

    public function supplierWisePurchasePdf(Request $request){
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function productWisePurchasePdf(Request $request){
        $data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf = PDF::loadView('backend.pdf.product-wise-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
