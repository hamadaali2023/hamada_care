@extends('layout.mainlayout_admin')
@section('content')	
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

							@if(session()->has('message'))
                            @include('admin.includes.alerts.success')
                            @endif
                            @if(Session::has('error'))
                               <div class="row mr-2 ml-2" >
                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                       {{Session::get('error')}}
                                    </button>
                                </div>
                            @endif 
						    
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
											@foreach ($appointments as $_item)
												<tr>
													<td>
														<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">
														<img class="avatar-img rounded-circle" 
																src="{{asset('assets_admin/img/doctors/photo/'.$_item->doctor['photo']) }}" alt="User Image" width="60px" height="60px"></a>
													</td>
													<td>
														<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">{{$_item->doctor['first_name_ar']}}</a>
														
													</td>
													<td>
														@foreach ($_item->category as $_appoin)
															@if($_appoin->id == $_item->doctor['specialityId'])
															   {{$_appoin->name_ar}}
															   
															@endif
														@endforeach
														
													</td>
													<td class="text-center">
														<h2 class="table-avatar">
															
															@if($_item->photo !=null)
                												<a href="{{url('patient-profile/'.$_item->id) }}"> 
                											        <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->photo) }}" alt="User Image" width="60px" height="60px">
                										        </a>
            											    @else
            											         <a href="{{url('patient-profile/'.$_item->id) }}">
            											             <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/profile_image.png') }}" alt="User Image" width="60px" height="60px">
            											        </a>
            											    @endif
														</h2>
													</td>
													<td>
														<a href="{{url('patient-profile/'.$_item->patient['id']) }}">
														    {{$_item->patient['first_name_ar'] }} {{$_item->patient['last_name_ar']}} </a>
													</td>
													<td> {{$_item->date}}<span class="text-primary d-block">{{$_item->time}}</span></td>
													
													<!-- <td>
														<span class="badge badge-pill bg-danger-light">Cancelled</span>
														<span class="badge badge-pill bg-warning-light">Pending</span>
														<span class="badge badge-pill bg-success-light">Confirm</span>
													</td> -->
													<td>
														
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        
               	                                        <a href="#" > <span data-toggle="modal" data-target="#exampleModall" class=""> 
               	                                        	@if($_item->status=='confirmed')
               	                                        		<span class="badge badge-pill bg-success-light">تم الموافقة</span> 
               	                                        	@elseif($_item->status=='cancelled')
               	                                        		<span class="badge badge-pill bg-danger-light">تم الرفض</span> 
               	                                        	@elseif($_item->status=='pending')
               	                                        		<span class="badge badge-pill bg-warning-light">قيد الانتظار</span> 
               	                                        		<!-- <span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span> -->
               	                                        				<!-- <img class="avatar-img rounded-circle" 
																src="{{asset('assets_admin/img/wait.png') }}" alt="User Image" width="60px" height="60px"> -->
               	                                        	@elseif($_item->status=='combledted')
               	                                        		<span class="badge badge-pill bg-primary-light">أكتمل</span>
               	                                        	@elseif($_item->status=='absent')
               	                                        		<span class="badge badge-pill  btn-secondary">لم يأتي</span>	
<!--                	                                        	@elseif($_item->status=='waiting')
               	                                        		<span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span>
               	                                        				<img class="avatar-img rounded-circle" 
																src="{{asset('assets_admin/img/wait.png') }}" alt="User Image" width="60px" height="60px"> -->
               	                                        	@endif
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
                                                                <form   action="{{url('appointments/update/status')}}" method="post">
                                                                 @csrf
                               										 <!-- @method('put') -->
                                    
                                                                <input type="hidden" name="appointmentId" value="{{ $_item->id }}" >   
                                                                     <div class="row clearfix">                                       
                                                                        <div class="col-sm-12 row"><label>حالة المستخدم</label></div>
                                                                            <div class="row">
                                                                            	<div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                               	 											    <input name="status" type="radio" value="pending" {{ ($_item->status=='pending')? 'checked' : '' }} />
                                                                                            <span>قيد الانتظار</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>                                             
                                                                                <div class="col-sm-12 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                    <label>
                                 													<input name="status" type="radio" value="confirmed" {{ ($_item->status=='confirmed')? 'checked' : '' }}/>
                                                                                        <span>موافقة</span>
                                                                                    	</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                                   												<input name="status" type="radio" value="cancelled" {{ ($_item->status=='cancelled')? 'checked' : '' }} />
                                                                                            <span>تم الرفض</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                           												        <input name="status" type="radio" value="combledted" {{ ($_item->status=='combledted')? 'checked' : '' }} />
                                                                                            <span>اكتمل</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                               												    <input name="status" type="radio" value="absent" {{ ($_item->status=='absent')? 'checked' : '' }} />
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
														   {{route('appointments.destroy',$_item->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn" style="    border: navajowhite;">
                                                                 <a  href="# "  onclick="return confirm('هل انت متأكد من مسح هذا العنصر ?')">
                                                                 	<i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                                 </a>
                                                            </button>
                                                        </form>
													</td>
													
												</tr>
											@endforeach
												
									
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
@endsection