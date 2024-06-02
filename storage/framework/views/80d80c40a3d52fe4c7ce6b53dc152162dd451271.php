<!DOCTYPE html>
<html lang="en">
<head>
    <title>pos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/backend')); ?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backend')); ?>/css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div>
                            <span class="login100-form-logo">
                                <i class="zmdi zmdi-landscape"></i>
                            </span>
                        </div>
                        <div>
                            <span class="login100-form-title p-b-34 p-t-27">
                                Rajbita Telecom
                            </span>
                        </div>
                    </div>

                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <strong><?php echo e($error); ?></strong><br/>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password">
                    </div><br>
                    <div class="container-login100-form-btn">
                        <button type="submit" name="button" class="login100-form-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('public/backend')); ?>/js/main.js"></script>

</body>
</html><?php /**PATH E:\xampp\htdocs\pos\resources\views/auth/login.blade.php ENDPATH**/ ?>