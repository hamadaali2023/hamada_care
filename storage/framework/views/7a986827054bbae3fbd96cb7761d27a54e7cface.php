
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Patient</li>
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
														<th>Patient ID</th>
														<th>Patient Name</th>
														<th>Mobile</th>
														<th>Email</th>
														
														<th class="text-right">Paid</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($_item->id); ?></td>
														<td>
															<h2 class="table-avatar">
																<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../assets_admin/img/patients/patient1.jpg" alt="User Image"></a>
																<a href="profile"><?php echo e($_item->name); ?> </a>
															</h2>
														</td>
														<td><?php echo e($_item->mobile); ?></td>
														<td><?php echo e($_item->email); ?></td>
														<td>$<?php echo e($_item->paid); ?></td>
														<td>
														<div class="actions">	
															<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>											
															<a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>															
															
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
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/doccure-10/template-rtl/resources/views/admin/patients/all.blade.php ENDPATH**/ ?>