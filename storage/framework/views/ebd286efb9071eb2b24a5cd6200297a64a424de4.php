<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                <h3>Invoice No #<?php echo e($invoice->invoice_no); ?> (<?php echo e(date('d-m-Y',strtotime($invoice->date))); ?>)
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('invoice.pending.list')); ?>"><i class="fa fa-list"></i> Pending Invoice List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php
                $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
                ?>
                <table width="100%">
                  <tbody>
                    <tr>
                      <td width="15%"><p><strong>Customer Info</strong></p></td>
                      <td width="25%"><p><strong>Name :</strong> <?php echo e($payment['customer']['name']); ?></p></td>
                      <td width="25%"><p><strong>Mobile No :</strong> <?php echo e($payment['customer']['mobile_no']); ?></p></td>
                      <td width="35%"><p><strong>Email :</strong> <?php echo e($payment['customer']['email']); ?></p></td>
                    </tr>
                    <tr>
                      <td width="15%"></td>
                      <td width="85%" colspan="3"><p><strong>Address :</strong> <?php echo e($payment['customer']['address']); ?></p></td>
                    </tr>
                    <tr>
                      <td width="15%"></td>
                      <td width="85%" colspan="3"><p><strong>Description :</strong> <?php echo e($invoice->description); ?></p></td>
                    </tr>
                  </tbody>
                </table>
                <form method="post" action="<?php echo e(route('approval.store',$invoice->id)); ?>">
                  <?php echo csrf_field(); ?>
                  <table border="1" width="100%" style="margin-bottom: 10px;">
                    <thead>
                      <tr class="text-center">
                        <th>SL.</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th style="background-color: #ddd; padding: 1px;">Current Stock</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total_sum = '0';
                      ?>
                      <?php $__currentLoopData = $invoice['invoice_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="text-center">
                        <input type="hidden" name="category_id[]" value="<?php echo e($details->category_id); ?>">
                        <input type="hidden" name="product_id[]" value="<?php echo e($details->product_id); ?>">
                        <input type="hidden" name="selling_qty[<?php echo e($details->id); ?>]" value="<?php echo e($details->selling_qty); ?>">
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($details['category']['name']); ?></td>
                        <td><?php echo e($details['product']['name']); ?></td>
                        <td style="background-color: #ddd; padding: 1px;"><?php echo e($details['product']['quantity']); ?></td>
                        <td><?php echo e($details->selling_qty); ?></td>
                        <td><?php echo e($details->unit_price); ?></td>
                        <td><?php echo e($details->selling_price); ?></td>
                      </tr>
                      <?php
                      $total_sum += $details->selling_price;
                      ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <tr class="text-center">
                        <td colspan="6"><strong>Sub Total :</strong></td>
                        <td><strong><?php echo e($total_sum); ?></strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="6"><strong>Discount :</strong></td>
                        <td><strong><?php echo e($payment->discount_amount); ?></strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="6"><strong>Paid Amount :</strong></td>
                        <td><strong><?php echo e($payment->paid_amount); ?></strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="6"><strong>Due Amount :</strong></td>
                        <td><strong><?php echo e($payment->due_amount); ?></strong></td>
                      </tr>
                      <tr class="text-center">
                        <td colspan="6"><strong>Grand Total :</strong></td>
                        <td><strong><?php echo e($payment->total_amount); ?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-success">Invoice Approve</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/invoice/invoice-approve.blade.php ENDPATH**/ ?>