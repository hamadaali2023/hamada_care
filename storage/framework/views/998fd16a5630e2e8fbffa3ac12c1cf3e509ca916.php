





<?php $__env->startSection('content'); ?> 

        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="<?php echo e(asset('assets_admin/img/settings/'.$contact->logo)); ?>" alt="branding logo">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login with Total Health Care</span>
                  </h6>
                </div>
                <div class="card-content">
                  	<div class="card-body">
                 
                    <form class="form-horizontal form-simple"  novalidate method="POST" action="<?php echo e(route('login')); ?>">
                      <?php echo csrf_field(); ?>
	                    <fieldset class="form-group position-relative has-icon-left mb-0">
	                        <input type="text" name="email" class="form-control form-control-lg input-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="user-name" placeholder="Your Username"
	                        required>
	                        <div class="form-control-position">
	                          <i class="ft-user"></i>
	                        </div>
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
	                    </fieldset>
	                    <fieldset class="form-group position-relative has-icon-left">
	                        <input type="password" name="password" class="form-control form-control-lg input-lg   <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="user-password"
	                        placeholder="Enter Password" required>
	                        <div class="form-control-position">
	                          <i class="la la-key"></i>
	                        </div>
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
	                    </fieldset>
	                    <div class="form-group row">
	                        <div class="col-md-6 col-12 text-center text-md-left">
	                          <fieldset>
	                            <!-- <input type="checkbox" id="remember-me" class="chk-remember"> -->
	                            <!-- <label for="remember-me"> Remember Me</label> -->
	                          </fieldset>
	                        </div>
	                        <!-- <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
	                    </div>
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="">
                    <!-- <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
                    <!-- <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/beaunqrp/public_html/sub/care/resources/views/admin/login.blade.php ENDPATH**/ ?>