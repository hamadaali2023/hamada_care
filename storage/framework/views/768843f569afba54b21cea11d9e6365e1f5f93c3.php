
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<style >

.modal-dialog {
    max-width: 890px ;
}

</style>
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">بيانات الدكتور : <?php echo e($doctors->first_name_ar); ?></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الدكتور</li>
								</ul>
							</div>
						</div>
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
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?php echo e(asset('assets_admin/img/doctors/photo/'.$doctors->photo)); ?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"> <?php echo e($doctors->first_name_ar); ?></h4>
										<h6 class="text-muted"> <?php echo e($doctors->email); ?></h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> <?php echo e($doctors->address_ar); ?></div>
										<div class="about-text"> <?php echo e($doctors->address_en); ?></div>
									</div>
									<!-- <div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab"
										data-target="#Workingـhours_tab" href="#">اوقات الدوام </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab"
										data-target="#services_tab" href="#">الخدمات </a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab"
										data-target="#offers_tab" href="#">العروض </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#per_details_tab">من انا </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#appointments_tab">حجوزاتي </a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab"
										data-target="#password_tab" href="#">كلمة المرور</a>
									</li> -->
																								
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont" >
								<div class="tab-pane fade " id="Workingـhours_tab" >								
									<!-- <div  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;background-color: white;"> -->
										<!-- Page Header -->
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">اوقات الدوام </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_apointment_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة جديد</a>
													</div>
												</div>
										</div>
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
																			<th>اليوم</th>
																			<th>بداية الفترج الأولى</th>
																			<th>نهاية الفترة الاوى</th>
																			<th>بداية الفترة الثانية</th>
																			<th>نهاية الفترة الثانية</th>
																			<th>بداية الفترة الثالثة</th>
																			<th>نهاية الفترة الثالثة</th>
																			<th>مدة الفحص</th>
																			<th class="text-right">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $__currentLoopData = $workday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<tr>	
																				<td class="text-center">
																					<?php echo e($_item->day); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->from_morning); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->to_morning); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->from_afternoon); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->to_afternoon); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->from_evening); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->to_evening); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->duration); ?>

																				</td>														
																				<td class="text-center">
																					<div class="actions">
																						<a class="btn btn-sm bg-success-light" data-toggle="modal" 
																						data-day ="<?php echo e($_item->day); ?>" 
																						data-from_morning ="<?php echo e($_item->from_morning); ?>"
																						data-to_morning ="<?php echo e($_item->to_morning); ?>"
																						data-from_afternoon ="<?php echo e($_item->from_afternoon); ?>"
																						data-to_afternoon ="<?php echo e($_item->to_afternoon); ?>"
																						data-from_evening ="<?php echo e($_item->from_evening); ?>"
																						data-to_morning ="<?php echo e($_item->to_morning); ?>"
																						data-to_evening ="<?php echo e($_item->to_evening); ?>"
																						data-catid="<?php echo e($_item->id); ?>" 
																						data-target="#edit">
																							<i class="fe fe-pencil"></i> تعديل
																						</a>
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
								<div class="tab-pane fade" id="services_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">الخدمات  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_services_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
													</div>
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
								                                <table
								                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                    <thead>
																		<tr>
																			<th>عنوان الخدمة عربي</th>
																			<th>عنوان الخدمة انجليزي</th>
																			<th>السعر</th>	
																			<th>النوع </th>	
																			<th class="text-center">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<tr>
																				<td class="text-center">
																					<?php echo e($_item->services_name_ar); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->services_name_en); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->price); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->type); ?>

																				</td>														
																				<td class="text-center">
																					<div class="actions">
																						<a class="btn btn-sm bg-success-light" href="<?php echo e(url('service/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a>

																						<a  data-toggle="modal" data-catid="<?php echo e($_item->id); ?>" data-target="#delete_service" class="btn btn-sm bg-danger-light">
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
								<div class="tab-pane fade show active" id="offers_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">العروض  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_offers_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة عرض</a>
													</div>
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
								                                <table
								                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                    <thead>
																		<tr>
																			<th>عنوان العرض عربي </th>
																			<th>عنوان العرض انجليزي </th>
																			<th>الوصف عربي</th>	
																			<th>الوصف انجليزي</th>	
																			<th>السعر القديم</th>	
																			<th>السعر الجديد</th>
																			<th>نوع العرض</th>	
																			<th>صورة العرض</th>	
																			<th class="text-center">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<tr>
																				<td class="text-center">
																					<?php echo e($_item->offer_name_ar); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->offer_name_en); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->description_ar); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->description_en); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->old_price); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->new_price); ?>

																				</td>
																				<td class="text-center">
																					<?php echo e($_item->type); ?>

																				</td>	
																				<td>
																					<a href="<?php echo e(url('doctor-profile/'.$_item->id)); ?>"> 
																						<img class="avatar-img rounded-circle" 
																							src="<?php echo e(asset('assets_admin/img/offers/'.$_item->image)); ?>" alt="offer Image" width="60px" height="60px">
																					</a>
																				</td>													
																				<td class="text-center">
																					<div class="actions">								
																						<a class="btn btn-sm bg-success-light" href="<?php echo e(url('offer/'.$_item->id).'/edit'); ?>"><i class="fe fe-pencil"></i> تعديل</a>
																						<a  data-toggle="modal" data-catid="<?php echo e($_item->id); ?>" data-target="#delete_offers" class="btn btn-sm bg-danger-light">
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
								<div class="tab-pane fade" id="appointments_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">حجوزاتي  </h3>
													</div>
													
												</div>
										</div>
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
												</div>			
										</div>
								</div>

								<div class="tab-pane fade " id="per_details_tab">
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<!-- <h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">الامس</p>
														<p class="col-sm-10"><?php echo e($doctors->first_name_ar); ?> <?php echo e($doctors->last_name_ar); ?></p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">البريد الإلكتروني</p>
														<p class="col-sm-10"><?php echo e($doctors->email); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">رقم الهاتف</p>
														<p class="col-sm-10"><?php echo e($doctors->mobile); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">العنوان</p>
														<p class="col-sm-10"><?php echo e($doctors->address_ar); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">عدد سنوات الخبرة</p>
														<p class="col-sm-10"><?php echo e($doctors->experience); ?></p>
													</div>
													
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">النوع</p>
														<p class="col-sm-10"><?php echo e($doctors->gender); ?></p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form>
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" class="form-control" value="John">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text"  class="form-control" value="Doe">
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="24-07-1983">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="johndoe@example.com">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" value="+1 202-555-0125" class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control" value="4663 Agriculture Lane">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" class="form-control" value="Miami">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" class="form-control" value="Florida">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="text" class="form-control" value="22434">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" class="form-control" value="United States">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									</div>
								</div>
								<!-- <div  class="tab-pane fade" id="password_tab">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				
				</div>			
			
			<!-- /Page Wrapper -->


		<!-- start apointment -->	
			<div class="modal fade" id="Add_apointment_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog " role="document"   >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة موعد</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form action="<?php echo e(route('doctors/addapointment')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<input type="hidden" name="doctorId" value="<?php echo e($doctors->id); ?>">
									<div class="col-md-6 col-sm-6">
										<label>من تاريخ</label>
										<div class="">
											<input type="date" name="from_date" class="form-control" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>إلى تاريخ</label>
										<div class="">
											<input type="date" name="to_date" class="form-control" >
										</div>
									</div>
									</div>
									<br/>
									<br/>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="السبت" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												السبت
											</label>	
											<input  name="day_number[]" type="hidden" value="1" >

										</div>
									</div>	
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الاحد" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاحد
											</label>									
											<input  name="day_number[]" type="hidden" value="2" >		
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الاثنين" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاثنين
											</label>						
											<input  name="day_number[]" type="hidden" value="3" >					
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الثلاثاء" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الثلاثاء
											</label>											
											<input  name="day_number[]" type="hidden" value="4" >
										</div>
									</div>
									<div class="col-md-3 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الاربعاء" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاربعاء
											</label>							
											<input  name="day_number[]" type="hidden" value="5" >				
										</div>
									</div>
									<div class="col-md-3 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الخميس" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الخميس
											</label>			
											<input  name="day_number[]" type="hidden" value="6" >								
										</div>
									</div>
									<div class="col-md-4 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="الجمعة" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الجمعة
											</label>											
											<input  name="day_number[]" type="hidden" value="7" >
										</div>
									</div>	
									<br/>
									<br/>
									<div class="col-md-6 row" 
										style="
											/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											
											margin-right: -2px !important;
											">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الأول</h6>
											<label>من </label>
											<div class="">
												<input type="time" name="from_morning" class="form-control" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" name="to_morning" class="form-control" >
											</div>
										</div>
									</div>
									<div class="col-md-6 row" 
										style="
										/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											margin-right: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الثاني</h6>
											<label>من </label>
											<div class="">
												<input type="time" class="form-control" name="from_afternoon" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_afternoon" >
											</div>
										</div>
									</div>
									
									<div class="col-md-12 row" >
										<br>
									</div>
									<div class="col-md-6 row" 
										style="
											/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											
											margin-right: -2px !important;
											">
										&nbsp;
										<div class="form-group">
											<h6>الدوام المسائي</h6>
											<label>من</label>
											<div class="">
												<input type="time" class="form-control" name="from_evening" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_evening">
											</div>
										</div>
									</div>
									<br/>
									
									<div class="col-md-6 row" 
										style="
											margin-right: 19px !important;">
										&nbsp;
										<div class="form-group">
											<label>مدة الكشف</label>
											<div class="">
												<input type="text" name="duration" class="form-control" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<!-- <div class="form-group">
											<label>إلي تاريخ</label>
											<div class="cal-icon">
												<input type="time" class="form-control" value="24-07-1983">
											</div>
										</div> -->
									</div>


									
									
								</div>
								<br/>
									<br/>
								<button type="submit" class="btn btn-primary btn-block">أضافة </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Edit apointment Modal -->
			<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل الموهد</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="<?php echo e(route('doctors.update.apointment')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id">
									<div class="col-md-12 col-sm-12">
										<label>من تاريخ</label>
										<div class="">
											<input type="text" name="day"  class="form-control" id="day">
										</div>
									</div>
									
								
									<br/>
									<br/>
									<div class="col-md-4 row" 
										style="	margin-right: -2px !important;margin-top: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الأول</h6>
											<label>من </label>
											<div class="">
												<input type="time" name="from_morning" class="form-control" id="fromMorning" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" name="to_morning" class="form-control"id="toMorning">
											</div>
										</div>
									</div>
									<div class="col-md-4 row" 
										style="margin-right: 19px !important;margin-top: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الثاني</h6>
											<label>من </label>
											<div class="">
												<input type="time" class="form-control" name="from_afternoon" id="fromAfternoon" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_afternoon" id="toAfternoon" >
											</div>
										</div>
									</div>
									
									<!-- <div class="col-md-12 row" >
										<br>
									</div> -->
									<div class="col-md-4 row" 
										style="margin-top: 19px !important;margin-right: -2px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام المسائي</h6>
											<label>من</label>
											<div class="">
												<input type="time" class="form-control" name="from_evening" id="fromEvening" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_evening" id="toEvening" >
											</div>
										</div>
									</div>
									<br/>
									
									
								</div><br/><br/>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
			<!-- Delete apointment Modal -->
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
										<form method="post" action="<?php echo e(route('doctors.delete.apointment')); ?>">
	                                   		 <?php echo csrf_field(); ?>
	                                         
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
		<!-- end apointment -->	

		<!-- start Services -->
			<div class="modal fade" id="Add_services_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog " role="document"   >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">إضافة خدمة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('doctors/addservice')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<input type="hidden" name="doctorId" value="<?php echo e($doctors->id); ?>">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة عربي</label>
											<input type="text" name="services_name_ar" class="form-control" value="<?php echo e(old('services_name_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة انجليزي</label>
											<input type="text" name="services_name_en" class="form-control" value="<?php echo e(old('services_name_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر</label>
											<input type="text" name="price" class="form-control" value="<?php echo e(old('price')); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع الخدمة</label>
											<select class="form-control select" name="type">
												<option selected disabled>اختر نوع الخدمة</option>
												<option value="Male">كشف</option>
												<option value="Female">استشارة</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>ايكون الخمدة </label>
											<input type="file" name="icon" class="form-control">
											<!-- <input type="hidden" name="url" value="profile_image.png"> -->
										</div>
									</div>
									
									
								</div>
								<br/>
									<br/>
								<button type="submit" class="btn btn-primary btn-block">أضافة </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="delete_service" aria-hidden="true" role="dialog">
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
										<form method="post" action="<?php echo e(route('doctors.delete.service')); ?>">
	                                   		 <?php echo csrf_field(); ?>
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
		<!-- end Services -->	

		<!-- start offers -->
			<div class="modal fade" id="Add_offers_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog " role="document"   >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">إضافة خدمة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('doctors/addoffers')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<input type="hidden" name="id" value="<?php echo e($doctors->id); ?>">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض عربي</label>
											<input type="text" name="offer_name_ar" class="form-control" value="<?php echo e(old('offer_name_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض انجليزي</label>
											<input type="text" name="offer_name_en" class="form-control" value="<?php echo e(old('offer_name_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف عربي</label>
											<input type="text" name="description_ar" class="form-control" value="<?php echo e(old('description_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف انجليزي</label>
											<input type="text" name="description_en" class="form-control" value="<?php echo e(old('description_en')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر القديم</label>
											<input type="text" name="old_price" class="form-control" value="<?php echo e(old('old_price')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر الجدد</label>
											<input type="text" name="new_price" class="form-control" value="<?php echo e(old('new_price')); ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع العرض</label>
											<select class="form-control select" name="type" >
												<option selected disabled>اختر نوع العرض</option>
												<option value="كشف" >كشف</option>
												<option value="استشارة" >استشارة</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>صورة العرض </label>
											<input type="file" name="image" class="form-control" >
											<input type="hidden" name="url" value="profile_image.png">
										</div>
									</div>
									
								</div>
								<br/>
									<br/>
								<button type="submit" class="btn btn-primary btn-block">أضافة </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="delete_offers" aria-hidden="true" role="dialog">
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
										<form method="post" action="<?php echo e(route('doctors.delete.offers')); ?>">
	                                   		 <?php echo csrf_field(); ?>
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
		<!-- end offers -->	
        </div>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<script>

    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var day = button.data('day') 
      var from_morning = button.data('from_morning') 
      var to_morning = button.data('to_morning') 
      var from_afternoon = button.data('from_afternoon')
      var to_afternoon = button.data('to_afternoon')
      var from_evening = button.data('from_evening')
      var to_evening = button.data('to_evening') 
      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #day').val(day);
      modal.find('.modal-body #fromMorning').val(from_morning);
      modal.find('.modal-body #toMorning').val(to_morning);
      modal.find('.modal-body #fromAfternoon').val(from_afternoon);
      modal.find('.modal-body #toAfternoon').val(to_afternoon);
      modal.find('.modal-body #fromEvening').val(from_evening);
      modal.find('.modal-body #toEvening').val(to_evening);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);

	})



	 $('#delete_service').on('show.bs.modal', function (event) {

	      var button = $(event.relatedTarget) 

	      var cat_id = button.data('catid') 
	      var modal = $(this)

	      modal.find('.modal-body #cat_id').val(cat_id);

	// end Services 
	})




	$('#delete_offer').on('show.bs.modal', function (event) {

	    var button = $(event.relatedTarget) 

	    var cat_id = button.data('catid') 
        var modal = $(this)

	    modal.find('.modal-body #cat_id').val(cat_id);

	// end offer 
	})



</script>    

		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/doctors/doctor-profile.blade.php ENDPATH**/ ?>