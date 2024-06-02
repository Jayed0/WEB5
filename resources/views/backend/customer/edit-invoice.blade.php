@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Credit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3>Edit Invoice (Invoice No #{{$payment['invoice']['invoice_no']}})
                  <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit')}}"><i class="fa fa-list"></i> Credit Customer List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table width="100%" style="margin-bottom: 10px">
                  <tbody>
                    <tr>
                      <td colspan="3"><strong>Customer Info</strong></td>
                    </tr>
                    <tr>
                      <td width="30%"><strong>Name : </strong>{{$payment['customer']['name']}}</td>
                      <td width="30%"><strong>Mobile : </strong>{{$payment['customer']['mobile_no']}}</td>
                      <td width="40%"><strong>Email : </strong>{{$payment['customer']['email']}}</td>
                    </tr>
                  </tbody>
                </table>
                <table width="100%" style="margin-bottom: 10px">
                  <tbody>
                    <tr>
                      <td width="50%"><p><strong>Address :</strong> {{$payment['customer']['address']}}</p></td>
                    </tr>
                  </tbody>
                </table>
                <table width="100%" style="margin-bottom: 50px">
                  <tbody>
                    <tr>
                      <td width="50%"><p><strong>Description :</strong> {{$payment['invoice']['description']}}</p></td>
                    </tr>
                  </tbody>
                </table>
                <form method="post" action="{{route('customers.update.invoice',$payment->invoice_id)}}" id="myForm">
                  @csrf
                  <table border="1" width="100%" style="margin-bottom: 30px;">
                    <thead>
                      <tr class="text-center">
                        <th>SL.</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $total_sum = '0';
                      $invoice_details = App\Model\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                      @endphp
                      @foreach($invoice_details as $key => $details)
                      <tr class="text-center">
                        <td style="text-align: center;">{{$key + 1}}</td>
                        <td style="text-align: center;">{{$details['category']['name']}}</td>
                        <td style="text-align: center;">{{$details['product']['name']}}</td>
                        <td style="text-align: center;">{{$details->selling_qty}}</td>
                        <td style="text-align: center;">{{$details->unit_price}}</td>
                        <td style="text-align: center;">{{$details->selling_price}}</td>
                      </tr>
                      @php
                      $total_sum += $details->selling_price;
                      @endphp
                      @endforeach
                      <tr class="text-center">
                        <td colspan="5" style="text-align: center;"><strong>Sub Total :</strong></td>
                        <td style="text-align: center;"><strong>{{$total_sum}}</strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="5" style="text-align: center;"><strong>Discount :</strong></td>
                        <td style="text-align: center;"><strong>{{$payment->discount_amount}}</strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="5" style="text-align: center;"><strong>Paid Amount :</strong></td>
                        <td style="text-align: center;"><strong>{{$payment->paid_amount}}</strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="5" style="text-align: center;"><strong>Due Amount :</strong></td>
                        <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                        <td style="text-align: center;"><strong>{{$payment->due_amount}}</strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="5" style="text-align: center;"><strong>Grand Total :</strong></td>
                        <td style="text-align: center;"><strong>{{$payment->total_amount}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>Paid Status</label>
                    <select name="paid_status" id="paid_status" class="form-control">
                      <option value="">Select Status</option>
                      <option value="full_paid">Full Paid</option>
                      <option value="partial_paid">Partial Paid</option>
                    </select>
                    <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="date">Date</label>
                    <input type="text" name="date" id="date" class="form-control datepicker" placeholder="YYYY-MM-DD" readonly>
                    <font style="color: red">{{($errors->has('date'))?($errors->first('date')):''}}</font>
                  </div>
                  <div class="form-group col-md-3" style="padding-top: 31px;">
                    <button type="submit" class="btn btn-primary">Invoice Update</button>
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
    $(document).on('change','#paid_status',function(){
      var paid_status = $(this).val();
      if (paid_status == 'partial_paid') {
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    });
  </script>
  <script>
    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          paid_status: {
            required: true,
          },
          date: {
            required: true,
          }
        },
        messages: {
          paid_status: {
            required: "Please select paid status",
          },
          date: {
            required: "Please select date",
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