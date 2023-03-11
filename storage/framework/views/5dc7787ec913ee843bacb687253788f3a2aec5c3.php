
<?php $__env->startSection('content'); ?>	

<!-- Page Wrapper -->

<!-- <link rel="stylesheet" href="<?php echo e(asset('assets_admin/select/selectthree.css')); ?>">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="<?php echo e(asset('assets_admin/select/choosen.js')); ?>"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->

					<div class="page-header">

						<!-- Page Wrapper -->
						

						
						<div class="row">
							<div class="col">
								<h3 class="page-title">  بيانات المريض : <?php echo e($patients->first_name_ar); ?> </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">

							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?php echo e(asset('assets_admin/img/patients/'.$patients->photo)); ?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"> <?php echo e($patients->email); ?></h4>
										<h6 class="text-muted"> <?php echo e($patients->mobile); ?></h6>
										<!-- <div class="user-Location"><i class="fa fa-map-marker"></i>  -->
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
										<a class="nav-link " data-toggle="tab" href="#per_details_tab">من أنا</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">تغيير كلمة المرور </a>
									</li> -->
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#booking_apointment_tab">مواعيدي</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade " id="per_details_tab">
								
									<!-- Personal Details -->
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
														<p class="col-sm-10"><?php echo e($patients->first_name_ar); ?> <?php echo e($patients->last_name_ar); ?></p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">البريد الإلكتروني</p>
														<p class="col-sm-10"><?php echo e($patients->email); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">رقم الهاتف</p>
														<p class="col-sm-10"><?php echo e($patients->mobile); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">تاريخ الميلاد</p>
														<p class="col-sm-10"><?php echo e($patients->dateOfBirth); ?></p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted  mb-0">عدد سنوات الخبرة</p>
														<p class="col-sm-10"><?php echo e($patients->experience); ?></p>
													</div> -->
													
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">النوع</p>
														<p class="col-sm-10"><?php echo e($patients->gender); ?></p>
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
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
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
								</div>

								<div class="tab-pane fade show active " id="booking_apointment_tab" >
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">الخدمات  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_booking_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
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
								                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
																<tbody>														<?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
																		<!--    <?php elseif($_item->status=='waiting'): ?>
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
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			
			<!-- /Page Wrapper -->

			<!-- start booking -->
				<div class="modal fade" id="Add_booking_details" aria-hidden="true" role="dialog">

					<div class="modal-dialog " role="document">

						<div class="modal-content">
							
							<div class="modal-header">
								<h5 class="modal-title">إضافة خدمة</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo e(route('patients.addbooking')); ?>" method="POST" 
	                                name="le_form"  enctype="multipart/form-data">
	                                <?php echo csrf_field(); ?>
									<div class=" form-row">
										<input type="hidden" name="patientId" value="<?php echo e($patients->id); ?>">
										
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>الاسم</label>
												<input type="text"  readonly class="form-control" value="<?php echo e($patients->first_name_ar); ?>">
											</div>
										</div>
										
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>رقم الموبايل</label>
												<input type="text"  readonly class="form-control" value="<?php echo e($patients->mobile); ?>">
											</div>
										</div>

							<div class="col-md-6 col-sm-6">
								<div class="form-group ">
									<label class="col-form-label col-md-2">التخصص</label>
									<select name="" class="form-control formselect required" placeholder="Select Category" id="get_doctors_name">
										<option  disabled selected>Select</option>	
										<?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
										   <option value="<?php echo e($_item->id); ?>"><?php echo e($_item->name_ar); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<!-- <div class="col-md-6 col-sm-6">
								<div class="form-group ">
									<label class="col-form-label col-md-2">الدكتور</label>
										<select name="doctorId" class="form-control formselect" placeholder="Select Sub Category" id="get_doctors">
							                <option>ergjhet</option>
							            </select>	
							    </div>
							</div> -->
		
							<div class="col-md-6 col-sm-6">
								<div class="form-group ">									 
								     <label class="col-form-label col-md-2">الدكتور</label>
								      <select name="doctorId" class="myselect form-control formselect"  id="get_doctors">
								         <option  disabled selected>اختار الدكتور</option>	
								      </select>

								</div>

							</div>	
													
							<style type="text/css">
								.select2-container {									    
								  width: 100% !important;		    
								}
								.select2-container .select2-selection--single{
											height: 40px;
								}
								.select2-container--default .select2-selection__rendered{
									line-height: 35;
								}
								.select2-container--default .select2-selection--single .select2-selection__arrow b{
									margin-top: 5px;
								}
								.select2-container--default .select2-search--dropdown .select2-search__field {
									
								    direction: rtl;
								}
							</style>
							<script type="text/javascript">
							  $(".myselect").select2();
							</script>
						

						


							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>التاريخ</label>
									<input type="date" name="date" class="form-control" id="get_date">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group " id="get_time">
																															
							    </div>
							</div>
										
									</div>
									<br/>
										<br/>
									<button type="submit" class="btn btn-primary btn-block">ارسال </button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
		        <script>
		            $(document).ready(function () {
		            // get doctors
		                $('#get_doctors_name').on('change', function () {
		                    let id = $(this).val();
		                    // $('#sub_category').empty();
		                    // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
		                    $.ajax({
		                        type: 'GET',
		                        url: "<?php echo e(url('getdoctor')); ?>/"+id,
		                        success: function (response) {
		                            var response = JSON.parse(response);
		                            console.log(response);   
		                            $('#get_doctors').empty();
		                            $('#get_doctors').append(`<option value="0" disabled selected>Select </option>`);
		                            response.forEach(element => {
		                                $('#get_doctors').append(`<option value="${element['id']}">
		                                   ${element['first_name_ar']} - ${element['id']} 
		                                	
		                                </option>`);
		                            });
		                        }
		                   });
		                });
		            //   
		            	$('#get_date').on('change', function () {
		                    let date = $(this).val();
		                    console.log(date);   
		                    // $('#sub_category').empty();
		                    // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
		                    $.ajax({
		                        type: 'GET',
		                        url: "<?php echo e(url('gettime')); ?>/"+date,

		                        success: function (response) {
		                            var response = JSON.parse(response);
		                               
		                            $('#get_time').empty();

		                            response.forEach(element => {
		                            	
		                            	// console.log(element.first_time['0']);
		                            	$('#get_time').append(`<h6>الدوام الأول : </h6>`);   
		                            	console.log(element.first_time);
		                            	for(var r = 0; r < element.first_time.length; r++)
						          		{
						          			// console.log(element.first_time[r]);
						          			if(element.first_time[r]=='لا يوجد مواعيد صباحا'){
						          				$('#get_time').append(`<p>${element.first_time[r]}</p>`);
						          			}else{
						          				$('#get_time').append(`
	                                            	<label style="margin:10;"><input type="radio" name="time"  value="${element.first_time[r]}" />
	                                                <span style="">${element.first_time[r]}</span>
	                                              </label>
                                           		`);
						          			}
                                            
							          	}
							          	$('#get_time').append(`<br></br>`); 
							          	$('#get_time').append(`<h6>الدوام الثاني : </h6>`);  
							          	for(var r = 0; r < element.second_time.length; r++)
						          		{
						          			// console.log(element.first_time[r]);
						          			// $('#get_time').append(`<option value="${element.first_time[r]}">${element.time[r]}</option>`);  
                                            

                                            if(element.second_time[r]=='لا يوجد مواعيد بعد الظهر'){
						          				$('#get_time').append(`<p>${element.second_time[r]}</p><br/>`);
						          			}else{
						          				$('#get_time').append(`
	                                            	<label style="margin:10;"><input type="radio" name="time" value="${element.second_time[r]}" />
	                                                <span style="">${element.second_time[r]}</span>
	                                              </label>
	                                            `);
						          			}
							          	}
							          	$('#get_time').append(`<br></br>`); 
							          	$('#get_time').append(`<h6>الدوام الثالث : </h6>`);  
							          	for(var r = 0; r < element.third_time.length; r++)
						          		{
						          			// console.log(element.first_time[r]);
						          			// $('#get_time').append(`<option value="${element.first_time[r]}">${element.time[r]}</option>`);  
						          			if(element.third_time[r]=='لا يوجد مواعيد ف المساء'){
						          				$('#get_time').append(`<p>${element.third_time[r]}</p><br/>`);
						          			}else{
						          				$('#get_time').append(`
                                            	<label style="margin:10;"><input type="radio" name="time" value="${element.third_time[r]}" />
                                                <span style="">${element.third_time[r]}</span>
                                              </label>
                                            `);
						          			}

                                            
							          	}
		                                
		                            });
		                        }

		            






		                   });
		                });    


		            });
		        </script>
			
        </div>

<style>
	
    label > input[type="radio"] {
      display: none;
    }
    label > input[type="radio"] + *::before {
      content: "";
      display: inline-block;
      vertical-align: bottom;
      width: 0rem;
      height: 0rem;
      margin-right: 0.0rem;
      border-radius: 50%;
      border-style: solid;
      border-width: 0.0rem;
      border-color: gray;
    }
    
    label > input[type="radio"] + * {
      background-color: white;
      box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;
    }
    label > input[type="radio"]:checked + * {
      color: #000;
      background-color: #dedede;
    }
    label > input[type="radio"]:checked + *::before {
         color: #000;
    	background-color: #dedede;
    }

   
    label > input[type="radio"] + * {
      display: inline-block;
      padding: 10px 10px;
    }
</style>


<?php $__env->stopSection(); ?>








<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/patients/patient-profile.blade.php ENDPATH**/ ?>