<?php $__env->startSection('content'); ?>	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
		
		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">مقدم الخدمة</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item">
			                	<a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">مقدم الخدمة
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>

			        <!-- <div class="content-header-right col-md-6 col-12">
			          <div class="dropdown float-md-right">
			               <a href="#Add_doctor_details" data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة دكتور</a>
			          </div>
			        </div> -->
			        

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
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
              	<div class="card-header">
                  <h4 class="card-title">قائمة مقدم الخدمة</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<div class="table-responsive">
		                    <table class="table table-striped table-bordered keytable-integration">
		                                     <thead>
												<tr>
													<th>ID</th>
													<th>الصورة</th>
													<th>أسم الدكتور</th>
													
													<th>الحالة</th>
													<th>أكشن</th>
													
												</tr>
											</thead>
											<tbody>

												<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td class="text-center"><?php echo e($_item->id); ?></td>
													<td class="text-center">	
														<a href="<?php echo e(url('doctor-profile/'.$_item->id)); ?>"> 
														<?php if($_item->photo!=null): ?>
															<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/photo/'.$_item->photo)); ?>" alt="User Image" width="60px" height="60px">
														<?php else: ?>
														    <img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/photo/profile.png')); ?>" alt="User Image" width="60px" height="60px">
														<?php endif; ?>
														</a>			
													</td>
													<td class="text-center">
														<h2 class="table-avatar">
															<a href="<?php echo e(url('doctor-profile/'.$_item->id)); ?>"> 
															<?php echo e($_item->first_name); ?> <?php echo e($_item->last_name); ?></a>
														</h2>
													</td>
													
												
													<td>
														<div class="status-toggle">
 				<input type="checkbox" data-id="<?php echo e($_item->id); ?>" name="status"  class="js-switch" <?php echo e($_item->status == 1 ? 'checked' : ''); ?>>
														</div>
													</td>
													<td>
														<div class="actions">	
															
															 <!-- <a class="btn btn-sm bg-success-light" href="<?php echo e(url('doctors/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a> -->
															<a  data-toggle="modal" data-catid="<?php echo e($_item->id); ?>" data-target="#delete" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> حذف
															</a>
														</div>
														
													</td>
													
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
		                                    
		                                </table>
		                            </div>			
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

			
			<!-- Edit Details Modal -->
			<!-- <div class="modal fade" id="Add_doctor_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة دكتور</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('doctors.store')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="<?php echo e(old('first_name_ar')); ?>" >
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="<?php echo e(old('first_name_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="<?php echo e(old('last_name_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="<?php echo e(old('last_name_en')); ?>">
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="text" name="password" class="form-control" class="form-control" value="<?php echo e(old('password')); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>الدولة </label>
											<select class="form-control select" name="countryId">
												<option>اختر الدولة</option>
												<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" ><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>المدينة </label>
											<select class="form-control select" name="cityId">
												<option>اختر المدينة</option>
												<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" ><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="address_ar" class="form-control" value="<?php echo e(old('address_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="address_en" class="form-control" value="<?php echo e(old('address_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>longitude</label>
											<input type="text" name="longitude" class="form-control" value="<?php echo e(old('longitude')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>latitude</label>
											<input type="text" name="latitude" class="form-control" value="<?php echo e(old('latitude')); ?>">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>التخصص </label> 
											<select class="form-control select" name="specialityId">
												<option>اختر التخصص</option>
												<?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												   <option value="<?php echo e($_item->id); ?>" ><?php echo e($_item->name_ar); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف التخصص عربي</label>
											<input type="text" name="specialityDesc_ar" class="form-control" value="<?php echo e(old('specialityDesc_ar')); ?>">
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف التخصص  انجليزي</label>
											<input type="text" name="specialityDesc_en" class="form-control" value="<?php echo e(old('specialityDesc_en')); ?>">
										</div>
									</div>

									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="<?php echo e(old('mobile')); ?>">
										</div>
									</div>
									
									
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عدد سنوات الخبرة</label>
											<input type="number" name="experience" class="form-control" value="<?php echo e(old('experience')); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" >ذكر</option>
												<option  value="Female" >أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم العضويه </label>
											<input type="number" name="membershipNo" class="form-control" value="<?php echo e(old('membershipNo')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>جهة تسجيل الطبيب عربي</label>
											<input type="text" name="authority_ar" class="form-control" value="<?php echo e(old('authority_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>جهة تسجيل الطبيب انجليزي</label>
											<input type="text" name="authority_en" class="form-control" value="<?php echo e(old('authority_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدرجة العملية عربي</label>
											<input type="text" name="degree_ar" class="form-control" value="<?php echo e(old('degree_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدرجة العلمية انجليزي</label>
											<input type="text" name="degree_en" class="form-control" value="<?php echo e(old('degree_en')); ?>">
										</div>
									</div> 
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>سنة التسجيل</label>
											<input type="number" name="yearOfRegistration" class="form-control" value="<?php echo e(old('yearOfRegistration')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الحساب البنكي</label>
											<input type="text" name="bankNumber" class="form-control" value="<?php echo e(old('bankNumber')); ?>">
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>صورة الدكتور </label>
											<input type="file" name="photo" class="form-control" value="<?php echo e(old('photo')); ?>">
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ</button>
							</form>
						</div>
					</div>
				</div>
			</div> -->

			
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل متأكد من الحذف</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="<?php echo e(route('doctors.destroy','test')); ?>">
	                                   		 <?php echo csrf_field(); ?>
	                                         <?php echo method_field('delete'); ?>
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
	                                    </form>
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </section>


<script src="<?php echo e(asset('js/app.js')); ?>"></script>

		<script>


		  $('#delete').on('show.bs.modal', function (event) {

		      var button = $(event.relatedTarget) 

		      var cat_id = button.data('catid') 
		      var modal = $(this)

		      modal.find('.modal-body #cat_id').val(cat_id);
		})


		</script>


		<script>
		        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

		        elems.forEach(function(html) {
		            let switchery = new Switchery(html,  { size: 'small' });
		        });
		        $(document).ready(function(){
		            $('.js-switch').change(function () {
		                let status = $(this).prop('checked') === true ? 1 : 0;
		                let userId = $(this).data('id');
		                $.ajax({
		                    type: "GET",
		                    dataType: "json",
		                    url: '<?php echo e(route('doctors.update.status')); ?>',
		                    data: {'status': status, 'user_id': userId},
		                    success: function (data) {
		                        toastr.options.closeButton = true;
		                        toastr.options.closeMethod = 'fadeOut';
		                        toastr.options.closeDuration = 100;
		                        toastr.success(data.message);
		                    }
		                });
		            });
		        });
		    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/doctors/all.blade.php ENDPATH**/ ?>