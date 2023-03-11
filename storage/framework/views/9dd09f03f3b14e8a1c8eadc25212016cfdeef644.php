


<?php $__env->startSection('content'); ?>	

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">بيانات التواصل</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">المستخدمين
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
										<form action="<?php echo e(url('settings/contactdata')); ?>" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                <?php echo csrf_field(); ?>
											<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
											
											<div class="form-group">
												<label>phone</label>
												<input type="text" name="phone" class="form-control" value="<?php echo e($contactInfo->phone); ?>">
											</div>
											<div class="form-group">
												<label>email </label>
												<input type="text" name="email" class="form-control" value="<?php echo e($contactInfo->email); ?>">
											</div>
											<div class="form-group">
												<label>العنوان عريب</label>
												<input type="text" name="address_ar" class="form-control" value="<?php echo e($contactInfo->address_ar); ?>">
											</div>
											<div class="form-group">
												<label>العنوان انجليزي </label>
												<input type="text" name="address_en" class="form-control" value="<?php echo e($contactInfo->address_en); ?>">
											</div>
											<div class="form-group">
												<label>longitude</label>
												<input type="text" name="longitude" class="form-control" value="<?php echo e($contactInfo->longitude); ?>">
											</div>

											<div class="form-group">
												<label>latitude</label>
												<input type="text" name="latitude" class="form-control" value="<?php echo e($contactInfo->latitude); ?>">
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
<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/settings/contact.blade.php ENDPATH**/ ?>