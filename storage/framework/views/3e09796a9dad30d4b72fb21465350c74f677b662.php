
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">الدول</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الدول</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a data-target="#Add_Specialities_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة دولة</a>
							</div>

						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
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
                            <!-- <?php if(Session::has('error')): ?>
                               <div class="row mr-2 ml-2" >
                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                       <?php echo e(Session::get('error')); ?>

                                    </button>
                                </div>
                            <?php endif; ?>  -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>													
													<th>الدولة عربي</th>
													<th>الدولة انجليزي</th>
													<th class="text-right">العمليات</th>
												</tr>
											</thead>
											<tbody>
												
											<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>													
													
													<td class="text-center">
														
														<?php echo e($_item->name_ar); ?>

													</td>
													<td class="text-center">
														
														<?php echo e($_item->name_en); ?>

													</td>
												
													<td class="text-center">
														<div class="actions">
															<!-- <a class="btn btn-sm bg-success-light" data-toggle="modal" 
															data-name_ar ="<?php echo e($_item->name_ar); ?>" 
															data-name_en ="<?php echo e($_item->name_en); ?>"
															data-icon ="<?php echo e($_item->icon); ?>" 
															data-catid="<?php echo e($_item->id); ?>" 
															data-target="#edit">
																<i class="fe fe-pencil"></i> تعديل
															</a> -->
															<a class="btn btn-sm bg-success-light" href="<?php echo e(url('countries/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a>

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
			
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة دولة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('countries.store')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي</label>
											<input type="text" name="name_ar" class="form-control" value="<?php echo e(old('name_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="<?php echo e(old('name_en')); ?>">
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">أضافة دولة </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل الدولة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="<?php echo e(route('countries.update','test')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id" >
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي </label>
											<input type="text" name="name_ar" class="form-control" id="namear" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" id="nameen" >
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>



						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
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
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="<?php echo e(route('countries.destroy','test')); ?>">
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
</div>
		<!-- /Main Wrapper -->


<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<script>
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var name_ar = button.data('name_ar') 
      var name_en = button.data('name_en') 
      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #namear').val(name_ar);
      modal.find('.modal-body #nameen').val(name_en);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/countries/all.blade.php ENDPATH**/ ?>