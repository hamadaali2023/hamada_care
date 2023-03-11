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
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="<?php echo e($doctor->first_name_ar); ?>" >
										</div>
									</div>
									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="<?php echo e($doctor->first_name_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="<?php echo e($doctor->last_name_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="<?php echo e($doctor->last_name_en); ?>">
										</div>
									</div>
									<!-- //////١//// -->
									<!-- <div class="col-12 col-sm-3">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="<?php echo e($doctor->email); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control" class="form-control" value="<?php echo e($doctor->password); ?>">
										</div>
									</div> -->
									<div class="col-md-3">
										<div class="form-group">
											<label>الدولة </label>
											<select class="form-control select" name="countryId">
												<option disabled>اختر الدولة</option>
												<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" <?php echo e(($_item->id==$doctor->specialityId) ? 'selected' : ''); ?>><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>المدينة </label>
											<select class="form-control select" name="cityId">
												<option disabled>اختر المدينة</option>
												<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" <?php echo e(($_item->id==$doctor->specialityId) ? 'selected' : ''); ?>><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<!-- ////////  2   ///////////// -->
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="address_ar" class="form-control" value="<?php echo e($doctor->address_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="address_en" class="form-control" value="<?php echo e($doctor->address_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>longitude</label>
											<input type="text" name="longitude" class="form-control" value="<?php echo e($doctor->longitude); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>latitude</label>
											<input type="text" name="latitude" class="form-control" value="<?php echo e($doctor->latitude); ?>">
										</div>
									</div>
									<!-- //////  3  //// -->
									<div class="col-md-3">
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
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>وصف التخصص عربي</label>
											<input type="text" name="specialityDesc_ar" class="form-control" value="<?php echo e($doctor->specialityDesc_ar); ?>">
										</div>
									</div>

									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>وصف التخصص  انجليزي</label>
											<input type="text" name="specialityDesc_en" class="form-control" value="<?php echo e($doctor->specialityDesc_en); ?>">
										</div>
									</div>

									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="<?php echo e($doctor->mobile); ?>">
										</div>
									</div>
									
									<!-- //////////4///////// -->
									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>عدد سنوات الخبرة</label>
											<input type="number" name="experience" class="form-control" value="<?php echo e($doctor->experience); ?>">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" <?php echo e(($doctor->gender=='Male') ? 'selected' : ''); ?>>ذكر</option>
												<option  value="Female" <?php echo e(($doctor->gender=='Female') ? 'selected' : ''); ?>>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم العضويه </label>
											<input type="number" name="membershipNo" class="form-control" value="<?php echo e($doctor->membershipNo); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية عربي</label>
											<input type="text" name="authority_ar" class="form-control" value="<?php echo e($doctor->authority_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>جهة تسجيل الطبيب انجليزي</label>
											<input type="text" name="authority_en" class="form-control" value="<?php echo e($doctor->authority_en); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية عربي</label>
											<input type="text" name="degree_ar" class="form-control" value="<?php echo e($doctor->degree_ar); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية انجليزي</label>
											<input type="text" name="degree_en" class="form-control" value="<?php echo e($doctor->degree_en); ?>">
										</div>
									</div> 
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>سنة التسجيل</label>
											<input type="number" name="yearOfRegistration" class="form-control" value="<?php echo e($doctor->yearOfRegistration); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم الحساب البنكي</label>
											<input type="text" name="bankNumber" class="form-control" value="<?php echo e($doctor->bankNumber); ?>">
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
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<embed src="<?php echo e(asset('assets_admin/img/doctors/certificate/'.$doctor->practice_certificate)); ?>"  style="width:90px; height:90px;" frameborder="1">
											
											<label>شهادة مزاولة المهنة </label>
											<input type="file" name="practice_certificate" class="form-control" >
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<embed src="<?php echo e(asset('assets_admin/img/doctors/certificate/'.$doctor->other_qualification)); ?>"  style="width:90px; height:90px;" frameborder="1">
											
											<label>مؤهلات أخرى </label>
											<input type="file" name="other_qualification" class="form-control" >
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/doctors/edit.blade.php ENDPATH**/ ?>