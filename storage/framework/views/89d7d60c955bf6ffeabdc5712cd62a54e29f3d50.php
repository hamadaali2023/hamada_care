
<?php $__env->startSection('content'); ?>	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form action="login">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="login">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doccure_laravel\template\resources\views/admin/forgot-password.blade.php ENDPATH**/ ?>