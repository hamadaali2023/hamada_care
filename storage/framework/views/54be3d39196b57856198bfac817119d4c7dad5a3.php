
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
									
								<form  method="post" action=" <?php echo e(route('specialities.update',$speciality->id)); ?>" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                               
								<div class="row form-row">
									<input type="hidden" name="id" value="<?php echo e($speciality->id); ?>" >
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>التخصص عربي </label>
											<input type="text" name="name_ar" class="form-control" value="<?php echo e($speciality->name_ar); ?>" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>التخصص انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="<?php echo e($speciality->name_en); ?>" >
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الايكون</label>
											<input type="file" name="icon"  class="form-control">
											<input type="hidden" name="url"  class="form-control" id="icon">
										</div>
									</div>
									<div class="col-12 col-sm-6 text-center" style="margin-top: 30px">
										<div class="form-check">
											<input class="form-check-input" name="top" type="checkbox" value="1"  <?php echo e(($speciality->top == 1 ? ' checked' : '')); ?>>
											<label class="form-check-label" for="invalidCheck">الظهور في الرئيسية</label>
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/specialities/edit.blade.php ENDPATH**/ ?>