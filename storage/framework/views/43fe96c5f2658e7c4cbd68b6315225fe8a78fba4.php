
<?php $__env->startSection('content'); ?>	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="<?php echo e(asset('assets_admin/img/settings/'.$contact->logo)); ?>" alt="Logo">

                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>تسجيل الدخول</h1>
								<p class="account-subtitle">الوصول إلى لوحة التحكم الخاصة بنا</p>
								
								<!-- Form -->
								<form method="POST" action="<?php echo e(route('login')); ?>">
                       				 <?php echo csrf_field(); ?>
									<div class="form-group">
										
										<input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

		                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($message); ?></strong>
		                                    </span>
		                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
									<div class="form-group">
										
										<input id="password" type="password" placeholder="كلمة المرور" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
										<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($message); ?></strong>
		                                    </span>
		                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">دخول</button>
									</div>
								</form>
								<!-- /Form -->								
								<!-- <div class="text-center forgotpass"><a href="forgot-password">Forgot Password?</a></div> -->
								<div class="login-or">
									<!-- <span class="or-line"></span> -->
									<!-- <span class="span-or">or</span> -->
								</div>
								  
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<!-- <div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div> -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templ/resources/views/admin/login.blade.php ENDPATH**/ ?>