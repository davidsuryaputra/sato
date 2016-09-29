<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('toolbar'); ?>
<!-- Bottom Toolbar-->
<div class="toolbar">
      <div class="toolbar-inner">
      <ul class="toolbar_icons">

      <?php if(Auth::check()): ?>
      <li><a href="#" data-panel="left" class="open-panel"><img src="mobix/images/icons/white/user.png" alt="" title="" /></a></li>
      <?php else: ?>
      <li class="menuicon"><a href="#" data-popup=".popup-login" class="open-popup"><img src="mobix/images/icons/white/lock.png" alt="" title="" /></a></li>
      <?php endif; ?>

      <!--
      <li><a href="photos.html"><img src="mobix/images/icons/white/photos.png" alt="" title="" /></a></li>
      <li class="menuicon"><a href="menu.html"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></li>
      <li><a href="blog.html"><img src="mobix/images/icons/white/blog.png" alt="" title="" /></a></li>
      <li><a href="contact.html"><img src="mobix/images/icons/white/contact.png" alt="" title="" /></a></li>
      -->
      </ul>
      </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Login Popup -->
 <div class="popup popup-login">
 <div class="content-block-login">
   <h4>LOGIN</h4>
   <div class="form_logo"><img src="mobix/images/logo.png" alt="" title="" /></div>
         <div class="loginform">
         <form id="LoginForm" method="post">
           <?php echo e(csrf_field()); ?>

         <input type="text" name="email" value="" class="form_input required" placeholder="Email" />
         <input type="password" name="password" value="" class="form_input required" placeholder="Password" />
         <!-- <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Forgot Password?</a></div> -->
         <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN IN" />
         </form>
         <!--
         <div class="signup_bottom">
           <p>Don't have an account?</p>
           <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
         </div>
         -->
         </div>
   <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
 </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('anu'); ?>
<div class="pages toolbar-through">

  <div data-page="index" class="page homepage">
    <div class="page-content">
  <div class="logo"><img src="<?php echo e(url('mobix/images/logo.png')); ?>" alt="" title="" /></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mobix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>