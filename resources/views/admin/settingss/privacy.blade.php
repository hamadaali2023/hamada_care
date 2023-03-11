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
								<div class="card">
									<div class="card-body">
										<form action="{{url('settings/update')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											<div class="form-group">
												<label>privacy</label>
												<input type="text" name="privacy" class="form-control" value="{{$contactInfo->privacy}}">
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