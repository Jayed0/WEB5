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
                <h3>Pending Invoice List
                  
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
                      <th>Status</th>
                      <th>Create</th>
                      <th>Approved</th>
                      <th width="12%">Action</th>
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
                      <td>
                        <?php if($invoice->status=='0'): ?>
                        <span style="background: #fa8072; padding: 5px; font-weight: bold;">Pending</span>
                        <?php elseif($invoice->status=='1'): ?>
                        <span style="background: #7CFC00; padding: 5px; font-weight: bold;">Approved</span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($invoice->created_by_name); ?></td>
                      <td><?php echo e($invoice->approved_by_name); ?></td>
                      <td>
                        <?php if($invoice->status=='0'): ?>
                        <a title="Approve" class="btn btn-sm btn-success" href="<?php echo e(route('invoice.approve',$invoice->id)); ?>"><i class="fa fa-check-circle"></i></a>
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/invoice/pending-invoice-list.blade.php ENDPATH**/ ?>