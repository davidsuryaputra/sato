<?php $__env->startSection('title', 'Log In'); ?>

<?php $__env->startSection('content'); ?>
<div class="login-box">
  <div class="login-logo">
    <b>Sato</b>PANEL
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo e(url('/')); ?>" method="post">
      <?php echo e(csrf_field()); ?>

      <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : 'has-feedback'); ?>">
        <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        <?php if($errors  ->has('email')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>


      </div>
      <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : 'has-feedback'); ?>">
        <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        <?php if($errors->has('password')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>

      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php /* <a href="#">I forgot my password</a><br> */ ?>
    <?php /* <a href="<?php echo e(url('register')); ?>" class="text-center">Register a new membership</a> */ ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>