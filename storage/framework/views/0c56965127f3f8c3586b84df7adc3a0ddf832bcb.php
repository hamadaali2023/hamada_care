
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								
								<h3 class="page-title">الاعدادات</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الاعدادات</li>
								</ul>
								<?php if(session()->has('message')): ?>
	                            <?php echo $__env->make('admin.includes.alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	                            <?php endif; ?>
	                            <?php if(Session::has('error')): ?>
	                               <div class="row mr-2 ml-2" >
	                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
	                                       <?php echo e(Session::get('error')); ?>

	                                    </button>
	                                </div>
	                            <?php endif; ?> 
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						
						<div class="col-12">
							
							<!-- General -->
							
								<div class="card">
									<!-- <div class="card-header">
										<h4 class="card-title">General</h4>
									</div> -->
									<div class="card-body">
										<form action="<?php echo e(url('settings/update')); ?>" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                <?php echo csrf_field(); ?>
											<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
											<div class="form-group">
												<label>title</label>
												<input type="text" name="title" class="form-control" value="<?php echo e($contactInfo->title); ?>">
											</div>
											<div class="form-group">
												<label>description</label>
												<input type="text" name="description" class="form-control" value="<?php echo e($contactInfo->description); ?>">
											</div>											
											<div class="form-group">
												<label>version</label>
												<input type="number" name="version" class="form-control" value="<?php echo e($contactInfo->version); ?>">
											</div>														
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="<?php echo e(asset('assets_admin/img/settings/'.$contactInfo->logo)); ?>" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>logo</label>
													<input type="file" name="logo" class="form-control">						
													<input type="hidden" name="url" value="<?php echo e($contactInfo->logo); ?>">	
												</div>												
											</div>
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="<?php echo e(asset('assets_admin/img/settings/'.$contactInfo->favicon)); ?>" alt="Speciality" width="120" height="100">
												</div>	
												<div class="col-md-10">
													<label>Favicon</label>
													<input type="file" name="favicon" class="form-control">	
													<input type="hidden" name="url2" value="<?php echo e($contactInfo->favicon); ?>">	
												</div>	
												
											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
								</div>
							
							<!-- /General -->
								
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/settings/settings.blade.php ENDPATH**/ ?>