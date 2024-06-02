@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                <h3>Select Criteria
                  {{-- <a class="btn btn-success float-right btn-sm" href="{{route('invoice.view')}}"><i class="fa fa-list"></i> Invoice List</a> --}}
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="GET" action="{{route('purchase.report.pdf')}}" target="_blank" id="myForm">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="start_date">Start Date</label>
                      <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="YYYY-MM-DD" readonly>
                      <font style="color: red">{{($errors->has('start_date'))?($errors->first('start_date')):''}}</font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="end_date">End Date</label>
                      <input type="text" name="end_date" id="end_date" class="form-control datepicker1" placeholder="YYYY-MM-DD" readonly>
                      <font style="color: red">{{($errors->has('end_date'))?($errors->first('end_date')):''}}</font>
                    </div>
                    
                    <div class="form-group col-md-1" style="padding-top: 30px;">
                      <button type="submit" class="btn btn-primary">Search</button>
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

  <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#myForm').validate({
          rules: {
            start_date: {
              required: true,
            },
            end_date: {
              required: true,
            }
          },
          messages: {
            start_date: {
              required: "Please select start date",
            },
            end_date: {
              required: "Please select end date",
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