@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Product List
                  <a class="btn btn-success float-right btn-sm" href="{{route('stock.report.pdf')}}" target="_blank"><i class="fa fa-download"></i> Download PDF</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Supplier Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>In Quantity</th>
                      <th>In Unit Price</th>
                      <th>In Buying Price</th>
                      <th>Out Quantity</th>
                      <th>Out Unit Price</th>
                      <th>Out Selling Price</th>
                      <th>Stock</th>
                      <th>Unit Name</th>
                      <th>Create</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $product)
                    @php
                    $buying_total_qty = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                    $buying_total_unit_price = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('unit_price');
                    $buying_total_buying_price = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_price');
                    $selling_total_qty = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                    $selling_total_unit_price = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('unit_price');
                    $selling_total_selling_price = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_price');
                    @endphp
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$product['supplier']['name']}}</td>
                      <td>{{$product['category']['name']}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$buying_total_qty}}</td>
                      <td>{{$buying_total_unit_price}}</td>
                      <td>{{$buying_total_buying_price}}</td>
                      <td>{{$selling_total_qty}}</td>
                      <td>{{$selling_total_unit_price}}</td>
                      <td>{{$selling_total_selling_price}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product['unit']['name']}}</td>
                      <td>{{$product->created_by_name}}</td>
                      <td>{{$product->updated_by_name}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection