
<?php $__env->startSection('content'); ?>	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<div class="lock-user">
									<img class="rounded-circle" src="../assets_admin/img/profiles/avatar-02.jpg" alt="User Image">
									<h4>John Doe</h4>
								</div>
								
								<!-- Form -->
								<form action="index">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Enter</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Sign in as a different user? <a href="login">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/admin/lock-screen.blade.php ENDPATH**/ ?>