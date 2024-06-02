<?php $__env->startSection('content'); ?>
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
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('products.add')); ?>"><i class="fa fa-plus-circle"></i> Add Product</a>
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
                      <th>Unit Name</th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e($product['supplier']['name']); ?></td>
                      <td><?php echo e($product['category']['name']); ?></td>
                      <td><?php echo e($product->name); ?></td>
                      <td><?php echo e($product['unit']['name']); ?></td>
                      <td><?php echo e($product->created_by_name); ?></td>
                      <td><?php echo e($product->updated_by_name); ?></td>
                      <?php
                      $count_product = App\Model\Purchase::where('product_id',$product->id)->count();
                      ?>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>"><i class="fa fa-edit"></i></a>
                        <?php if($count_product < 1): ?>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="<?php echo e(route('products.delete',$product->id)); ?>"><i class="fa fa-trash"></i></a>
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/product/view-product.blade.php ENDPATH**/ ?>