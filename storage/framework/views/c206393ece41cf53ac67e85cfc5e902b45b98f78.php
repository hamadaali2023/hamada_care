
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
													<th>صورة الدكتور </th>
													<th>أسم الدكتور</th>
													<th>التخصص</th>
													<th>صورة المريض</th>
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
														<a href="<?php echo e(url('doctor-profile/'.$_item->doctor['id'])); ?>">
														<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/doctors/'.$_item->doctor['photo'])); ?>" alt="User Image" width="60px" height="60px"></a>
													</td>
													<td>
														<a href="<?php echo e(url('doctor-profile/'.$_item->doctor['id'])); ?>"><?php echo e($_item->doctor['first_name_ar']); ?></a>
														
													</td>
													<td>
														<?php $__currentLoopData = $_item->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_appoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if($_appoin->id == $_item->doctor['specialityId']): ?>
															   <?php echo e($_appoin->name_ar); ?>

															   
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														
													</td>
													<td class="text-center">
														<h2 class="table-avatar">
															<a href="<?php echo e(url('patient-profile/')); ?>">
															    <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->patient['photo'])); ?>" alt="User Image" width="60px" height="60px">
															</a>
														</h2>
													</td>
													<td>
														<a href="<?php echo e(url('patient-profile/')); ?>"><?php echo e($_item->patient['first_name']); ?> </a>
													</td>
													<td> <?php echo e($_item->date); ?><span class="text-primary d-block"><?php echo e($_item->time); ?></span></td>
													
													<!-- <td>
														<span class="badge badge-pill bg-danger-light">Cancelled</span>
														<span class="badge badge-pill bg-warning-light">Pending</span>
														<span class="badge badge-pill bg-success-light">Confirm</span>
													</td> -->
													<td>
														
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        
               	                                        <a href="#" > <span data-toggle="modal" data-target="#exampleModall" class=""> 
               	                                        	<?php if($_item->status=='confirmed'): ?>
               	                                        		<span class="badge badge-pill bg-success-light">تم الموافقة</span> 
               	                                        	<?php elseif($_item->status=='cancelled'): ?>
               	                                        		<span class="badge badge-pill bg-danger-light">تم الرفض</span> 
               	                                        	<?php elseif($_item->status=='pending'): ?>
               	                                        		<span class="badge badge-pill bg-warning-light">قيد الانتظار</span> 
               	                                        		<!-- <span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span> -->
               	                                        				<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/wait.png')); ?>" alt="User Image" width="60px" height="60px">
               	                                        	<?php elseif($_item->status=='combledted'): ?>
               	                                        		<span class="badge badge-pill bg-primary-light">أكتمل</span>
               	                                        	<?php elseif($_item->status=='absent'): ?>
               	                                        		<span class="badge badge-pill  btn-secondary">لم يأتي</span>	
<!--                	                                        	<?php elseif($_item->status=='waiting'): ?>
               	                                        		<span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span>
               	                                        				<img class="avatar-img rounded-circle" 
																src="<?php echo e(asset('assets_admin/img/wait.png')); ?>" alt="User Image" width="60px" height="60px"> -->
               	                                        	<?php endif; ?>
               	                                        </a>   
                                                                                       
                                                        <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog"
                                                                           aria-labelledby="formModal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document" >
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="formModal">صلاحية المستخدم</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="margin: 20px">
                                                                <form   action="<?php echo e(url('appointments/update/status')); ?>" method="post">
                                                                 <?php echo csrf_field(); ?>
                               										 <!-- <?php echo method_field('put'); ?> -->
                                    
                                                                <input type="hidden" name="appointmentId" value="<?php echo e($_item->id); ?>" >   
                                                                     <div class="row clearfix">                                       
                                                                        <div class="col-sm-12 row"><label>حالة المستخدم</label></div>
                                                                            <div class="row">                                             
                                                                                <div class="col-sm-12 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                    <label>
                                 													<input name="status" type="radio" value="confirmed" <?php echo e(($_item->status=='confirmed')? 'checked' : ''); ?>/>
                                                                                        <span>موافقة</span>
                                                                                    	</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                                   												<input name="status" type="radio" value="cancelled" <?php echo e(($_item->status=='cancelled')? 'checked' : ''); ?> />
                                                                                            <span>تم الرفض</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                               	 											    <input name="status" type="radio" value="pending" <?php echo e(($_item->status=='pending')? 'checked' : ''); ?> />
                                                                                            <span>قيد الانتظار</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                           												        <input name="status" type="radio" value="combledted" <?php echo e(($_item->status=='combledted')? 'checked' : ''); ?> />
                                                                                            <span>اكتمل</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                               												    <input name="status" type="radio" value="absent" <?php echo e(($_item->status=='absent')? 'checked' : ''); ?> />
                                                                                            <span>لم يأتي</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                               						
                                                    
														        <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>     
                                                                </form>
                                                                </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wadialry/zlitn.com/rytert/template-rtl/resources/views/admin/appointment-list.blade.php ENDPATH**/ ?>