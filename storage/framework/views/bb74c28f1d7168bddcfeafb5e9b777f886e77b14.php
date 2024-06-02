<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
                <h3>Edit Supplier
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('suppliers.view')); ?>"><i class="fa fa-list"></i> Supplier List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="<?php echo e(route('suppliers.update',$editData->id)); ?>" id="myForm">
                  <?php echo csrf_field(); ?>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">Supplier Name</label>
                      <input type="text" name="name" value="<?php echo e($editData->name); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('name'))?($errors->first('name')):''); ?></font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mobile_no">Mobile No</label>
                      <input type="text" name="mobile_no" value="<?php echo e($editData->mobile_no); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('mobile_no'))?($errors->first('mobile_no')):''); ?></font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" value="<?php echo e($editData->email); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('email'))?($errors->first('email')):''); ?></font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Address</label>
                      <input type="text" name="address" value="<?php echo e($editData->address); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('address'))?($errors->first('address')):''); ?></font>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="submit" value="Update" class="btn btn-primary">
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
          mobile_no: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          address: {
            required: true,
          }
        },
        messages: {
          name: {
            required: "Please enter supplier name",
          },
          mobile_no: {
            required: "Please enter supplier mobile no",
          },
          email: {
            required: "Please enter supplier email address",
            email: "Please enter a <em>vaild</em> email address",
          },
          address: {
            required: "Please enter supplier address",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/supplier/edit-supplier.blade.php ENDPATH**/ ?>