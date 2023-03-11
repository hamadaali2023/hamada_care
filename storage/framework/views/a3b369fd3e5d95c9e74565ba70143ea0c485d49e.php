
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
									
								<form  method="post" action=" <?php echo e(route('doctors.update',$doctor->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                               
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="<?php echo e($doctor->first_name_ar); ?>" >
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="<?php echo e($doctor->first_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="<?php echo e($doctor->last_name_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="<?php echo e($doctor->last_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="<?php echo e($doctor->email); ?>">
										</div>
									</div>
									<!-- <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control"  value="<?php echo e($doctor->first_name_ar); ?>">
										</div>
									</div> -->
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="<?php echo e($doctor->mobile); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="address_ar" class="form-control" value="<?php echo e($doctor->address_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="address_en" class="form-control" value="<?php echo e($doctor->address_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الموقع</label>
											<input type="text" name="location" class="form-control" value="<?php echo e($doctor->location); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>سعر الكشف</label>
											<input type="number" name="detectionPrice" class="form-control" value="<?php echo e($doctor->detectionPrice); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عدد سنوات الخبرة</label>
											<input type="number" name="experience" class="form-control" value="<?php echo e($doctor->experience); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>التخصص </label>
											<select class="form-control select" name="specialityId">
												<option>اختر التخصص</option>
												<?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" <?php echo e(($_item->id==$doctor->specialityId) ? 'selected' : ''); ?>><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" <?php echo e(($doctor->gender=='Male') ? 'selected' : ''); ?>>ذكر</option>
												<option  value="Female" <?php echo e(($doctor->gender=='Female') ? 'selected' : ''); ?>>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/photo/'.$doctor->photo)); ?>" alt="User Image" width="60px" height="60px">
											<label>صورة الدكتور </label>
											<input type="file" name="photo" class="form-control" >
											<input type="hidden" name="url" value="<?php echo e($doctor->photo); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<a href="<?php echo e(asset('assets_admin/img/doctors/degree/'.$doctor->university_degree)); ?>" target="_black">
												<embed src="<?php echo e(asset('assets_admin/img/doctors/degree/'.$doctor->university_degree)); ?>"  style="width:90px; height:50px;" frameborder="1">
											</a>
											
											<a href="<?php echo e(asset('assets_admin/img/doctors/degree/'.$doctor->university_degree)); ?>" target="_black">
											<label>الشهادة الجامعية </label>			</a>								
											<input type="file" name="university_degree" class="form-control" >
											<input type="hidden" name="url2" value="<?php echo e($doctor->university_degree); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<embed src="<?php echo e(asset('assets_admin/img/doctors/certificate/'.$doctor->practice_certificate)); ?>"  style="width:90px; height:90px;" frameborder="1">
											
											<label>شهادة مزاولة المهنة </label>
											<input type="file" name="practice_certificate" class="form-control" >
											<input type="hidden" name="url3" value="<?php echo e($doctor->practice_certificate); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<embed src="<?php echo e(asset('assets_admin/img/doctors/certificate/'.$doctor->other_qualification)); ?>"  style="width:90px; height:90px;" frameborder="1">
											
											<label>مؤهلات أخرى </label>
											<input type="file" name="other_qualification" class="form-control" >
											<input type="hidden" name="url4" value="<?php echo e($doctor->other_qualification); ?>">
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wadialry/zlitn.com/rytert/template-rtl/resources/views/admin/doctors/edit.blade.php ENDPATH**/ ?>