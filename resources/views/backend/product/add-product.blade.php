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
                <h3>Add Product
                  <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i> Product List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('products.store')}}" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="supplier_id">Supplier Name</label>
                      <select name="supplier_id" class="form-control select2 select2bs4">
                        <option value="">Select Supplier</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                      </select>
                      <font style="color: red">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="unit_id">Unit Name</label>
                      <select name="unit_id" class="form-control select2 select2bs4">
                        <option value="">Select Unit</option>
                        @foreach($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                      </select>
                      <font style="color: red">{{($errors->has('unit_id'))?($errors->first('unit_id')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="category_id">Category Name</label>
                      <select name="category_id" class="form-control select2 select2bs4">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      <font style="color: red">{{($errors->has('category_id'))?($errors->first('category_id')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Product Name</label>
                      <input type="text" name="name" class="form-control">
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                  </div>
                </form>
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

  <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
          supplier_id: {
            required: true,
          },
          unit_id: {
            required: true,
          },
          category_id: {
            required: true,
          }
        },
        messages: {
          name: {
            required: "Please enter product name",
          },
          supplier_id: {
            required: "Please select supplier name",
          },
          unit_id: {
            required: "Please select unit name",
          },
          category_id: {
            required: "Please select category name",
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
@endsection