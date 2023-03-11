
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">قائمة المواعيد</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">الادمن بانل</a></li>
									<li class="breadcrumb-item active">المواعيد</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">

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
						    
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									
									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>أسم الدكتور</th>
													<th>التخصص</th>
													<th>أسم المريض</th>
													<th>وقت الموعد</th>
													<th>حالة الموعد</th>
													<th>اكشن</th>
												</tr>
											</thead>
											<tbody>
											<?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/'.$_item->doctor['photo'])); ?>" alt="User Image" width="60px" height="60px">
															<a href="<?php echo e(url('doctor-profile/'.$_item->doctor['id'])); ?>"><?php echo e($_item->doctor['name']); ?></a>
														</h2>
													</td>
													<td>
														<?php $__currentLoopData = $_item->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_appoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($_appoin->id == $_item->doctor['specialityId']): ?>
															   <?php echo e($_appoin->name_ar); ?>

															   
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														
													</td>
													<td>
														<h2 class="table-avatar">
															<img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->patient['photo'])); ?>" alt="User Image">

															<a href="<?php echo e(url('patient-profile/')); ?>"><?php echo e($_item->patient['name']); ?> </a>
														</h2>
													</td>
													<td> <?php echo e($_item->date); ?><span class="text-primary d-block"><?php echo e($_item->time); ?></span></td>
													
													<td>
														<!-- <span class="badge badge-pill bg-danger-light">Cancelled</span> -->
														<span class="badge badge-pill bg-warning-light">Pending</span>
														<!-- <span class="badge badge-pill bg-success-light">Confirm</span> -->
													</td>
													<td>
														<!-- <button type="button" class="btn btn-danger">Danger</button> -->
														 <form method="post" action="
														   
														   <?php echo e(route('appointments.destroy',$_item->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <button type="submit" class="btn" style="    border: navajowhite;">
                                                                 <a  href="# "  onclick="return confirm('هل انت متأكد من مسح هذا العنصر ?')">
                                                                 	<i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                                 </a>
                                                            </button>
                                                        </form>
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/admin/appointment-list.blade.php ENDPATH**/ ?>