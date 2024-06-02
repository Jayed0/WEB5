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
                <h3>Invoice List
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('invoice.add')); ?>"><i class="fa fa-plus-circle"></i> Add Invoice</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Create</th>
                      <th>Approved</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td>
                      <?php echo e($invoice['payment']['customer']['name']); ?>

                      (<?php echo e($invoice['payment']['customer']['mobile_no']); ?> - <?php echo e($invoice['payment']['customer']['email']); ?> - <?php echo e($invoice['payment']['customer']['address']); ?>)
                      </td>
                      <td>Invoice No #<?php echo e($invoice->invoice_no); ?></td>
                      <td><?php echo e(date('d-m-Y',strtotime($invoice->date))); ?></td>
                      <td><?php echo e($invoice->description); ?></td>
                      <td><?php echo e($invoice['payment']['total_amount']); ?></td>
                      <td><?php echo e($invoice->created_by_name); ?></td>
                      <td><?php echo e($invoice->approved_by_name); ?></td>
                      <td>
                        <?php if(Auth::user()->usertype=='Admin'): ?>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="<?php echo e(route('invoice.delete',$invoice->id)); ?>"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/invoice/view-invoice.blade.php ENDPATH**/ ?>