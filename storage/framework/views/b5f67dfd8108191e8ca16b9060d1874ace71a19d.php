
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">تعديل الدولة</h3>
								
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active"> العروض</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
							<?php if(session()->has('message')): ?>
                            <?php echo $__env->make('admin.includes.alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
						      <div class="alert alert-warning">
						        <ul>
						          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						          <li><?php echo e($error); ?></li>
						          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        </ul>
						      </div>
						    <?php endif; ?>
								<div class="card-body">
									
								<form  method="post" action=" <?php echo e(route('cities.update',$city->id)); ?>" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                               
								<div class="row form-row">
									<input type="hidden" name="id" value="<?php echo e($city->id); ?>" >
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي </label>
											<input type="text" name="name_ar" class="form-control" value="<?php echo e($city->name_ar); ?>" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="<?php echo e($city->name_en); ?>" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>الدولة </label>
											<select class="form-control select" name="countryId">
												<option disabled>اختر الدولة</option>
												<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" <?php echo e(($_item->id==$city->countryId) ? 'selected' : ''); ?>><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									
								</div>
								<br/><br/>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/cities/edit.blade.php ENDPATH**/ ?>