
<?php $__env->startSection('content'); ?>	
  <script src="<?php echo e(asset('admin/vendors/js/editors/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
  <script src="  <?php echo e(asset('admin/js/scripts/editors/editor-ckeditor.js')); ?>" type="text/javascript"></script>

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">سياسة الخصوصية</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">سياسة الخصوصية
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        
			        <?php if(session('success')): ?>
			            <div class="alert alert-success">
			                <?php echo e(session('success')); ?>

			            </div>
			        <?php endif; ?>

			        <?php if(count($errors) > 0): ?>
			                <div class="alert alert-danger">
			                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                    <strong>خطا</strong>
			                    <ul>
			                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        <li><?php echo e($error); ?></li>
			                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                    </ul>
			                </div>
			                <?php endif; ?>
		</div>
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<form action="<?php echo e(url('settings/privacy')); ?>" method="POST" name="le_form"  enctype="multipart/form-data">
			                <?php echo csrf_field(); ?>
											<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
											
											<div class="form-group">
												<label>سياسة الخصوصية عربي</label>
												<!-- <input type="text" name="privacy" class="form-control" value="<?php echo e($contactInfo->privacy); ?>"> -->
												<textarea name="privacy_ar" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor"><?php echo e($contactInfo->privacy_ar); ?></textarea>

											</div>
											<div class="form-group">
												<label>سياسة الخصوصية انجليزي</label>
												<!-- <input type="text" name="privacy" class="form-control" value="<?php echo e($contactInfo->privacy); ?>"> -->
												<textarea name="privacy_en" id="des" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor"><?php echo e($contactInfo->privacy_en); ?></textarea>

											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/settings/privacy.blade.php ENDPATH**/ ?>