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
									
								<form  method="post" action="<?php echo e(route('doctors.update.offers')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<input type="hidden" name="id" value="<?php echo e($edit->id); ?>">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض عربي</label>
											<input type="text" name="offer_name_ar" class="form-control" value="<?php echo e($edit->offer_name_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض انجليزي</label>
											<input type="text" name="offer_name_en" class="form-control" value="<?php echo e($edit->offer_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف عربي</label>
											<input type="text" name="description_ar" class="form-control" value="<?php echo e($edit->description_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف انجليزي</label>
											<input type="text" name="description_en" class="form-control" value="<?php echo e($edit->description_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر القديم</label>
											<input type="text" name="old_price" class="form-control" value="<?php echo e($edit->old_price); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر الجدد</label>
											<input type="text" name="new_price" class="form-control" value="<?php echo e($edit->new_price); ?>">
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
												<img class="avatar-img " src="<?php echo e(asset('assets_admin/img/offers/'.$edit->image)); ?>" alt="offer Image" width="80px" height="80px">
											</a>
											<label>صورة العرض </label>
											<input type="file" name="image" class="form-control" >
											<input type="hidden" name="url" value="<?php echo e($edit->image); ?>">
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/doctors/edit_offer.blade.php ENDPATH**/ ?>