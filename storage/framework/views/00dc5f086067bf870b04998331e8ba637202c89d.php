
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">General Settings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
									<li class="breadcrumb-item active">General Settings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						
						<div class="col-12">
							
							<!-- General -->
							
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">General</h4>
									</div>
									<div class="card-body">
										<form action="#">
									
											<div class="form-group">
												<label>Company Title</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Phone</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>E-mail</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Location</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>mesion ar</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>mesion en</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>mesion Image</label>
												<input type="file" class="form-control">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<div class="form-group">
												<label>Vesion ar</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Vesion en</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Vesion Image</label>
												<input type="file" class="form-control">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<div class="form-group">
												<label>Description ar</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Description en</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label>Version</label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group">
												<label> Logo</label>
												<input type="file" class="form-control">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											<div class="form-group mb-0">
												<label>Favicon</label>
												<input type="file" class="form-control">
												<small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
												<small class="text-secondary">Accepted formats : only png and ico</small>
											</div>
											
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/doccure-10/template-rtl/resources/views/admin/settings/settings.blade.php ENDPATH**/ ?>