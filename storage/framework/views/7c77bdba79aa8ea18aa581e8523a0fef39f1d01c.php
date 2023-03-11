<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">تعديل العروض</h3>
								
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
									
								<form  method="post" action="<?php echo e(route('doctors.update.service')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<input type="hidden" name="id" value="<?php echo e($edit->id); ?>">
										<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة عربي</label>
											<input type="text" name="services_name_ar" class="form-control" value="<?php echo e($edit->services_name_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة انجليزي</label>
											<input type="text" name="services_name_en" class="form-control" value="<?php echo e($edit->services_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر</label>
											<input type="text" name="price" class="form-control" value="<?php echo e($edit->price); ?>">
										</div>
									</div>
									
									
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع العرض</label>
											<select class="form-control select" name="type" >
												<option value="كشف" <?php echo e(($edit->type=='كشف') ? 'selected' : ''); ?>>كشف</option>
												<option value="استشارة" <?php echo e(($edit->type=='استشارة') ? 'selected' : ''); ?>>استشارة</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<a href="<?php echo e(url('doctor-profile/'.$edit->id)); ?>"> 
												<img class="avatar-img " src="<?php echo e(asset('assets_admin/img/services/'.$edit->icon)); ?>" alt="offer Image" width="80px" height="80px">
											</a>
											<label>صورة العرض </label>
											<input type="file" name="icon" class="form-control" >
											<input type="hidden" name="url" value="<?php echo e($edit->icon); ?>">
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/doctors/edit_servic.blade.php ENDPATH**/ ?>