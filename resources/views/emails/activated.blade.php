 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title>activated </title>
 		@include('layout.admin_head')

 	</head>
 	<body background="white">
	 	<div class="content container-fluid" style="padding: 100px; "  >
	 		@if(Session::has('message'))
		 		<div class="alert alert-success">
		        <strong>حسناً</strong> {{ session()->get('message') }} يرجى الرجوع للتطبيق لتسجيل الدخول
			    </div>
		    @endif              
		    @if(Session::has('error'))
			    <div class="row mr-2 ml-2" >
			            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
			                    id="type-error">{{Session::get('error')}}
			            </button>
			    </div>
			@endif


			@if(Session::has('error'))
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{Session::get('error')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
		    @endif 
		    </div>    

 	</body>
 	</html>