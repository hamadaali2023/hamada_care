
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						    
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									
									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											<?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_appointments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
															<a href="profile"><?php echo e($_appointments->doctor); ?></a>
														</h2>
													</td>
													<td>
														<?php $__currentLoopData = $_appointments->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_appoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($_appoin->id == $_appointments->doctorid): ?>
															   <?php echo e($_appointments->category['0']['name_ar']); ?>

															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

														
														   
														
														
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/patients/patient1.jpg" alt="User Image"></a>
															<a href="profile"><?php echo e($_appointments->patient); ?> </a>
														</h2>
													</td>
													<td> <?php echo e($_appointments->date); ?><span class="text-primary d-block"><?php echo e($_appointments->time); ?></span></td>
													
													<td>
														<span class="badge badge-pill bg-danger-light">Cancelled</span>
														<span class="badge badge-pill bg-warning-light">Pending</span>
														<span class="badge badge-pill bg-success-light">Confirm</span>
													</td>
													
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
									
											</tbody>
		                                    
		                                </table>
		                            </div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/doccure-10/template-rtl/resources/views/admin/appointment-list.blade.php ENDPATH**/ ?>