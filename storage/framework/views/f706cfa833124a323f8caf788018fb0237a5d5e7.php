
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
									


									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>Patient Name</th>
													<th>Doctor Name</th>
													<th>Aricle Name ar</th>
													<th>Aricle Name En</th>
													<th>Ratings</th>
													
													<th>Date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/patients/patient1.jpg" alt="User Image"></a>
															<a href="profile"><?php echo e($_item->patientname); ?></a>
														</h2>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
															<a href="profile">
															<?php $__currentLoopData = $_item->doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_rev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($_rev->id == $_item->articleid): ?>
																   <?php echo e($_item->doctor['0']['name']); ?>

																<?php endif; ?>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</a>
														</h2>
													</td>
													
													
													<td>
														<?php echo e($_item->articlear); ?>

													</td>
													<td>
														<?php echo e($_item->articleen); ?>

													</td>
													<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
													</td>
													
													
														<td><?php echo e(mb_strimwidth($_item->created_at,0,10)); ?> <br>
														<small><?php echo e(substr($_item->created_at,10,11)); ?></small></</td>
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
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
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
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
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Save </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/admin/reviews/all.blade.php ENDPATH**/ ?>