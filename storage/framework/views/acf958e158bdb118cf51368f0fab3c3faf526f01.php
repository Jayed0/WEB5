<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase</h1>
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
                <h3>Purchase List
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('purchase.add')); ?>"><i class="fa fa-plus-circle"></i> Add Purchase</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Purchase No</th>
                      <th>Date</th>
                      <th>Supplier Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Buying Price</th>
                      <th>Status</th>
                      <th>Create</th>
                      <th>Approved</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e($purchase->purchase_no); ?></td>
                      <td><?php echo e(date('d-m-Y',strtotime($purchase->date))); ?></td>
                      <td><?php echo e($purchase['supplier']['name']); ?></td>
                      <td><?php echo e($purchase['category']['name']); ?></td>
                      <td><?php echo e($purchase['product']['name']); ?></td>
                      <td><?php echo e($purchase->description); ?></td>
                      <td>
                        <?php echo e($purchase->buying_qty); ?>

                        <?php echo e($purchase['product']['unit']['name']); ?>

                      </td>
                      <td><?php echo e($purchase->unit_price); ?></td>
                      <td><?php echo e($purchase->buying_price); ?></td>
                      <td>
                        <?php if($purchase->status=='0'): ?>
                        <span style="background: #fa8072; padding: 5px; font-weight: bold;">Pending</span>
                        <?php elseif($purchase->status=='1'): ?>
                        <span style="background: #7CFC00; padding: 5px; font-weight: bold;">Approved</span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($purchase->created_by_name); ?></td>
                      <td><?php echo e($purchase->updated_by_name); ?></td>
                      <td>
                        <?php if(Auth::user()->usertype=='Admin'): ?>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="<?php echo e(route('purchase.delete',$purchase->id)); ?>"><i class="fa fa-trash"></i></a>
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/purchase/view-purchase.blade.php ENDPATH**/ ?>