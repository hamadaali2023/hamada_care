
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">تعديل بيانات الدكتور</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active"> الدكتور</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									
								<form  method="post" action=" <?php echo e(route('patients.update',$patient->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                               
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="<?php echo e($patient->first_name_ar); ?>" >
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="<?php echo e($patient->first_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="<?php echo e($patient->last_name_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="<?php echo e($patient->last_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="<?php echo e($patient->email); ?>">
										</div>
									</div>
									<!-- <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control" value="<?php echo e($patient->photo); ?>">
										</div>
									</div> -->
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="<?php echo e($patient->mobile); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" <?php echo e(($patient->gender=='Male') ? 'selected' : ''); ?>>ذكر</option>
												<option  value="Female" <?php echo e(($patient->gender=='Female') ? 'selected' : ''); ?>>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>تاريخ الميلاد</label>
											<input type="date" name="dateOfBirth" class="form-control" value="<?php echo e($patient->dateOfBirth); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<a href="<?php echo e(url('patient-profile/')); ?>">
															<img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$patient->photo)); ?>" alt="User Image" width="60px" height="60px">
															</a>
											<label>الصوره </label>
											<input type="file" name="photo" class="form-control">
											<input type="hidden" name="url"  value="<?php echo e($patient->photo); ?>">
										</div>
									</div>
								
								</div>
								
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/patients/edit.blade.php ENDPATH**/ ?>