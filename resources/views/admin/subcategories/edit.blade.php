
@extends('layout.admin_main')
@section('content')	


	<div class="content-header row">
		<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			<h3 class="content-header-title mb-0 d-inline-block">الكتب</h3><br>
			<div class="row breadcrumbs-top d-inline-block">
	            <div class="breadcrumb-wrapper col-12">
			        <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a></li>
			            <li class="breadcrumb-item active">الكتب</li>
			        </ol> 
			    </div>
            </div>
		</div>
		<div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href=""  class="btn btn-primary float-right mt-2">رجوع</a>
            </div>
        </div>
    	<div class="content-header-center col-md-12 col-12">
			@if(session()->has('message'))
                @include('admin.includes.alerts.success')
            @endif
            @if ($errors->any())
			<div class="alert alert-warning">
			    <ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
        </div>
	</div>

	<div class="content-body">
        <section class="inputmask" id="inputmask">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">تفاصيل الكتاب</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                       <form  method="post" action=" {{route('subcategories.update',$subcategory->id)}}" enctype="multipart/form-data">
                                 @csrf
                                @method('put')
                               
								<div class="row form-row">
									<input type="hidden" name="id" value="{{$subcategory->id}}" >
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الخدمة الفرعية عربي </label>
											<input type="text" name="title_ar" class="form-control" value="{{$subcategory->title_ar}}" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الخدمة الفرعية انجليزي</label>
											<input type="text" name="title_en" class="form-control" value="{{$subcategory->title_en}}" >
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف الخدمة الرفعية عربي </label>
											<input type="text" name="description_ar" class="form-control" value="{{$subcategory->description_en}}" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف الخدمة الرفعية انجليزي</label>
											<input type="text" name="description_en" class="form-control" value="{{$subcategory->description_en}}" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>حدد نوع الخدمة </label>
											<select class="form-control select" name="type">
												<option value="0" >ساعة واحدة</option>
												<option value="1" >اكثر من ساعة</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>حدد الخدمة الرئيسية </label>
											<select class="form-control select" name="categoryId">
												<option disabled selected>اختر الخدمة الرئيسي</option>
												@foreach ($categories as $_item)
												   <option value="{{$_item->id}}" >{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<img class="avatar-img" src="{{asset('assets_admin/img/subcategory/'.$subcategory->icon) }}" alt="Speciality" width="50" height="50">
											<label>الايكون</label>
											<input type="file" name="icon"  class="form-control">
											<input type="hidden" name="url"  class="form-control" id="icon">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<img class="avatar-img" src="{{asset('assets_admin/img/subcategory/'.$subcategory->image) }}" alt="Speciality" width="50" height="50">
											<label>الصورة</label>
											<input type="file" name="image"  class="form-control">

										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>سعر الخدمة</label>
											<input type="text" name="price" class="form-control" value="{{$subcategory->price}}">
										</div>
									</div>

									<div class="col-12 col-sm-6 text-left" style="margin-top: 30px">
										<div class="form-check">
											<input class="form-check-input" name="top" type="checkbox" value="1"  {{  ($subcategory->top == 1 ? ' checked' : '') }}>
											<label class="form-check-label" for="invalidCheck">الظهور في الرئيسية</label>
										</div>
									</div>
									
								</div>
								<br/><br/>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
    


   
@endsection


