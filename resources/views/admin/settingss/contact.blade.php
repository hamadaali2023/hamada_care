@extends('layout.admin_main')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								
								<h3 class="page-title">الاعدادات</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الاعدادات</li>
								</ul>
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
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						
						<div class="col-12">
							
							<!-- General -->
							
								<div class="card">
									<!-- <div class="card-header">
										<h4 class="card-title">General</h4>
									</div> -->
									<div class="card-body">
										<form action="{{url('settings/update')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											<div class="form-group">
												<label>phone</label>
												<input type="text" name="phone" class="form-control" value="{{$contactInfo->phone}}">
											</div>
											<div class="form-group">
												<label>email </label>
												<input type="text" name="email" class="form-control" value="{{$contactInfo->email}}">
											</div>
											<div class="form-group">
												<label>address </label>
												<input type="text" name="address" class="form-control" value="{{$contactInfo->address}}">
											</div>
											<div class="form-group">
												<label>longitude</label>
												<input type="text" name="longitude" class="form-control" value="{{$contactInfo->longitude}}">
											</div>

											<div class="form-group">
												<label>latitude</label>
												<input type="text" name="latitude" class="form-control" value="{{$contactInfo->latitude}}">
											</div>
											
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
								</div>
							
							<!-- /General -->
								
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
@endsection