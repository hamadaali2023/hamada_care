

<?php $__env->startSection('content'); ?>		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">مرحبا <?php echo e(Auth::user()->name); ?>!</h3>
								<ul class="breadcrumb">
									<!-- <li class="breadcrumb-item active">Dashboard</li> -->
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo e($doctorsCount); ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">الدكاتره</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo e($patientsCount); ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">المرضى</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo e($appointmentsCount); ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">المواعيد</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>$62523</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-md-12 d-flex">
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">قائمة الدكاتره</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>أسم الدكتور</th>
													<th>التخصص </th>
													<!-- <th>Speciality En</th> -->
													<th>عضو منذ </th>
													<!-- <th>Earned</th> -->
													<!-- <th>Account Status</th> -->
												</tr>
											</thead>
											<tbody>

												<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td class="text-center">
														<h2 class="table-avatar">
															<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/'.$_item->photo)); ?>" alt="User Image" width="60px" height="60px">
															<a href="profile"><?php echo e($_item->first_name_ar); ?> <?php echo e($_item->last_name_ar); ?></a>
														</h2>
													</td>
													
													<td class="text-center">

														<?php echo e($_item->categorynamear); ?>

													</td class="text-center">
													<!-- <td><?php echo e($_item->categorynamear); ?></td> -->
													
													<td class="text-center"><?php echo e(mb_strimwidth($_item->created_at,0,10)); ?> <br>
														<small><?php echo e(substr($_item->created_at,10,11)); ?></small></td>
													
													
													<!-- <td>$<?php echo e($_item->earned); ?></td> -->
													
													
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


					<div class="row">
						
						<div class="col-md-12 d-flex">
							
								<!-- Feed Activity -->
								<div class="card  card-table flex-fill">
									<div class="card-header">
										<h4 class="card-title">قائمة المرضى</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table
			                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
			                                    <thead>
														<tr>
															
															<th>أسم المريض</th>
															<th>رقم الموبايل</th>
															<th>البريد الإلكتروني</th>
															
															<!-- <th class="text-right">Paid</th> -->
															<!-- <th>Actions</th> -->
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<tr>
															<td class="text-center">
																<h2 class="table-avatar">
																	<img class="avatar-img rounded-circle" 
																	src="<?php echo e(asset('assets_admin/img/patients/'.$_item->photo)); ?>" alt="User Image" width="60px" height="60px">
																	<a href="profile"><?php echo e($_item->first_name_ar); ?> <?php echo e($_item->last_name_ar); ?></a>
																</h2>
															</td>
															<td class="text-center"><?php echo e($_item->mobile); ?></td>
															<td class="text-center"><?php echo e($_item->email); ?></td>
															<!-- <td>$<?php echo e($_item->paid); ?></td> -->
															
															
															
														</td>
															
														</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</tbody>
			                                    
			                                </table>
										</div>
									</div>
								</div>
								<!-- /Feed Activity -->
								
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">قائمة المواعيد</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>اسم الدكتور</th>
													<th>التخصص</th>
													<th>اسم المريض</th>
													<th>الوقت</th>
													<th>حالة الموعد</th>
												</tr>
											</thead>
											<tbody>
											<?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td class="text-center">
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/'.$_item->doctor['photo'])); ?>" alt="User Image"></a>
															<a href="<?php echo e(url('doctor-profile/'.$_item->doctor['id'])); ?>"><?php echo e($_item->doctor['name']); ?></a>
														</h2>
													</td>
													<td class="text-center">
														<?php $__currentLoopData = $_item->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_appoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($_appoin->id == $_item->doctor['specialityId']): ?>
															   <?php echo e($_appoin->name_ar); ?>

															   
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														
													</td>
													<td class="text-center">
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->patient['photo'])); ?>" alt="User Image"></a>
															<a href="<?php echo e(url('patient-profile/')); ?>"><?php echo e($_item->patient['name']); ?> </a>
														</h2>
													</td>
													<td> <?php echo e($_item->date); ?><span class="text-primary d-block"><?php echo e($_item->time); ?></span></td>
													
													<td class="text-center">
														<!-- <span class="badge badge-pill bg-danger-light">Cancelled</span> -->
														<span class="badge badge-pill bg-warning-light">Pending</span>
														<!-- <span class="badge badge-pill bg-success-light">Confirm</span> -->
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
			</div>
			
		
        </div>
		<!-- /Main Wrapper -->
	   <?php $__env->stopSection(); ?>
	  
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/index_admin.blade.php ENDPATH**/ ?>