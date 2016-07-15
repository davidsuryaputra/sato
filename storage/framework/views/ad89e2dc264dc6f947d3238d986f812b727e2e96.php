<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo e(url('bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('bootstrap/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('bootstrap/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css"> -->
  <?php echo e(Html::style('Source-Sans-Pro/css/fonts.css')); ?>

  <?php echo e(Html::style('dist/css/AdminLTE.min.css')); ?>

  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->
  <?php echo e(Html::style('plugins/iCheck/square/blue.css')); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="/favicon.ico">
</head>

<body class="hold-transition login-page">

<?php echo $__env->yieldContent('content'); ?>

<!-- jQuery 2.2.0 -->
<!-- <script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script> -->
<?php echo e(Html::script('plugins/jQuery/jQuery-2.2.0.min.js')); ?>

<!-- Bootstrap 3.3.6 -->
<!-- <script src="../../bootstrap/js/bootstrap.min.js"></script> -->
<?php echo e(Html::script('bootstrap/js/bootstrap.min.js')); ?>

<!-- iCheck -->
<!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->
<?php echo e(Html::script('plugins/iCheck/icheck.min.js')); ?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
