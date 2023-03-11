
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Reviews</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Reviews</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									
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

									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>اسم المريض</th>
													<th>اسم الدكتور </th>
													<th>التقييم</th>
													<th>الوصف</th>
													<th>التاريخ</th>
													
													
													<th class="text-right">أكشن</th>
												</tr>
											</thead>

											<tbody>
												<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
												
												<tr role="row" class="odd">
													<td class="sorting_1">
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->patient['photo'])); ?>" alt="User Image" width="60px" height="60px">

															<a href="profile.html"> <?php echo e($_item->patient['first_name_ar']); ?></a>
														</h2>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/photo/'.$_item->doctor['photo'])); ?>" alt="User Image" width="60px" height="60px"></a>
															<a href="profile.html">	
																<?php echo e($_item->doctor['first_name_ar']); ?>

															</a>
														</h2>
													</td>
													<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
													</td>
													<td>
														<?php echo e($_item->comment); ?>

														
													<td><?php echo e(mb_strimwidth($_item->created_at,0,10)); ?> <br>
														<small><?php echo e(substr($_item->created_at,10,11)); ?></small></</td>
													<td class="text-right">
														<div class="actions">

															<a class="btn btn-sm bg-danger-light" data-toggle="modal" data-catid="<?php echo e($_item->id); ?>" data-target="#delete" >
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
										<form method="post" action="<?php echo e(route('reviews.destroy','test')); ?>">
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
   
     

	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/reviews/all.blade.php ENDPATH**/ ?>