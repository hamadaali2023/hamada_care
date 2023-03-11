











<?php $__env->startSection('content'); ?>	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
		
		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">متلقي الخدمة</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item">
			                	<a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">متلقي الخدمة
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>

			        <!-- <div class="content-header-right col-md-6 col-12">
			          <div class="dropdown float-md-right">
			               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة جديد</a>
			          </div>
			        </div> -->


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
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
              	<div class="card-header">
                  <h4 class="card-title">قائمة متلقي الخدمة</h4>
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
														<th >ID</th>
														<th>الصورة</th>
														<th>أسم المريض</th>
														<th>الموبايل</th>
														<th>البريد اللكتروني</th>
														
														
														<th>الحالة</th>
														<th>العمليات</th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td class="text-center"><?php echo e($_item->id); ?></td>
														<td class="text-center">
														
															<?php if($_item->photo !=null): ?>
        														 <a href="<?php echo e(url('patient-profile/'.$_item->id)); ?>"> 
        												            <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->photo)); ?>" alt="User Image" width="60px" height="60px">
        												        </a>
        												    <?php else: ?>
        												         <a href="<?php echo e(url('patient-profile/'.$_item->id)); ?>">
        												             <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/profile_image.png')); ?>" alt="User Image" width="60px" height="60px">
        												        </a>
        												    <?php endif; ?>
														</td>
														<td class="text-center">
															<h2 class="table-avatar">	
															<a href="<?php echo e(url('patient-profile/'.$_item->id)); ?>"> 	
															   <?php echo e($_item->first_name); ?> <?php echo e($_item->last_name); ?> </a>
															</h2>
														</td>
														<td class="text-center"><?php echo e($_item->mobile); ?></td>
														<td class="text-center"><?php echo e($_item->email); ?></td>
														
														<td class="text-center">
															<div class="status-toggle">
 															<input type="checkbox" data-id="<?php echo e($_item->id); ?>" name="status"  class="js-switch" <?php echo e($_item->status == 1 ? 'checked' : ''); ?>>
														</div>
														</td>	
														<td class="text-center">														
															<div class="actions">	
																
																<!-- <a class="btn btn-sm bg-success-light" href="<?php echo e(url('patients/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a> -->
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



			
			
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة مريض</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('patients.store')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول عربي</label>
											<input type="text" name="first_name_ar" class="form-control">
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>أسم العائلة عربي</label>
											<input type="text" name="last_name_ar" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>أسم العائلة انجليزي</label>
											<input type="text" name="last_name_en" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option>اختر النوع</option>
												<option value="Male">ذكر</option>
												<option value="Female">أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>تاريخ الميلاد</label>
											<input type="date" name="dateOfBirth" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="photo" class="form-control">
											<input type="hidden" name="url"  value="profile_image.png">
										</div>
									</div>
								
								</div>
								<button type="submit" class="btn btn-primary btn-block"> حفظ </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
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
										<form method="post" action="<?php echo e(route('patients.destroy','test')); ?>">
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

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
		                    url: '<?php echo e(route('patients.update.status')); ?>',
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

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/patients/all.blade.php ENDPATH**/ ?>