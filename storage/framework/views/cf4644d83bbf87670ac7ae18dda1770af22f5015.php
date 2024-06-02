<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                <h3>Edit Profile
                  <a class="btn btn-success float-right btn-sm" href="<?php echo e(route('profiles.view')); ?>"><i class="fa fa-list"></i> Your Profile</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="<?php echo e(route('profiles.update')); ?>" id="myForm" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="<?php echo e($editData->name); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('name'))?($errors->first('name')):''); ?></font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Email</label>
                      <input type="email" name="email" value="<?php echo e($editData->email); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('email'))?($errors->first('email')):''); ?></font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="mobile">Mobile No</label>
                      <input type="text" name="mobile" value="<?php echo e($editData->mobile); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('mobile'))?($errors->first('mobile')):''); ?></font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="address">Address</label>
                      <input type="text" name="address" value="<?php echo e($editData->address); ?>" class="form-control">
                      <font style="color: red"><?php echo e(($errors->has('address'))?($errors->first('address')):''); ?></font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="gender">Gender</label>
                      <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo e(($editData->gender=="Male")?"selected":""); ?>>Male</option>
                        <option value="Female" <?php echo e(($editData->gender=="Female")?"selected":""); ?>>Female</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-2">
                      <img id="showImage" src="<?php echo e((!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_image.png')); ?>" style="width: 150px; height: 160px; border: 1px solid #000;">
                    </div>
                    <div class="form-group col-md-6" style="padding-top: 30px;">
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
          gender: {
            required: true,
          },
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          mobile: {
            required: true,
          },
          address: {
            required: true,
          }
        },
        messages: {
          gender: {
            required: "Please select gender",
          },
          name: {
            required: "Please enter  your name",
          },
          email: {
            required: "Please enter email address",
            email: "Please enter a <em>vaild</em> email address",
          },
          mobile: {
            required: "Please enter  your mobile",
          },
          address: {
            required: "Please enter  your address",
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/user/edit-profile.blade.php ENDPATH**/ ?>