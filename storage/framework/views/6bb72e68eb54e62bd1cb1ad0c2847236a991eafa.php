
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">قائمة المرضى</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<!-- <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li> -->
									<li class="breadcrumb-item active">المرضى</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a data-target="#Add_Specialities_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة جديد</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
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
							<div class="card">
								<div class="card-body">
									

									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
													<tr>
														<th >ID</th>
														<th>الصورة</th>
														<th>أسم المريض</th>
														<th>الموبايل</th>
														<th>البريد اللكتروني</th>
														
														<!-- <th>Paid</th> -->
														<th>الحالة</th>
														<th>أكشن</th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td class="text-center"><?php echo e($_item->id); ?></td>
														<td class="text-center">
															<a href="<?php echo e(url('patient-profile/')); ?>">
															<img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->photo)); ?>" alt="User Image" width="60px" height="60px">
															</a>
														</td>
														<td class="text-center">
															<h2 class="table-avatar">	
															<a href="<?php echo e(url('patient-profile/'.$_item->id)); ?>"> 	
															   <?php echo e($_item->first_name_ar); ?> <?php echo e($_item->last_name_ar); ?> </a>
															</h2>
														</td>
														<td class="text-center"><?php echo e($_item->mobile); ?></td>
														<td class="text-center"><?php echo e($_item->email); ?></td>
														<!-- <td class="text-center">$<?php echo e($_item->paid); ?></td> -->
														<td class="text-center">
															<div class="status-toggle">
 															<input type="checkbox" data-id="<?php echo e($_item->id); ?>" name="status"  class="js-switch" <?php echo e($_item->status == 1 ? 'checked' : ''); ?>>
														</div>
														</td>	
														<td class="text-center">														
															<div class="actions">	
																<!-- <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>											
																<a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
																	<i class="fe fe-pencil"></i> Edit
																</a>															 -->
																<a class="btn btn-sm bg-success-light" href="<?php echo e(url('patients/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a>
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
			<!-- /Page Wrapper -->

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
        </div>
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

		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wadialry/zlitn.com/rytert/template-rtl/resources/views/admin/patients/all.blade.php ENDPATH**/ ?>