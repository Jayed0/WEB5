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
          <section class="col-md-8 offset-md-2">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" 
                       src="<?php echo e((!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no_image.png')); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

                <p class="text-muted text-center"><?php echo e($user->address); ?></p>

                <table width="100%" class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Mobile No</td>
                      <td><?php echo e($user->mobile); ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td><?php echo e($user->gender); ?></td>
                    </tr>
                  </tbody>
                </table>

                <a href="<?php echo e(route('profiles.edit')); ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
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
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pos\resources\views/backend/user/view-profile.blade.php ENDPATH**/ ?>