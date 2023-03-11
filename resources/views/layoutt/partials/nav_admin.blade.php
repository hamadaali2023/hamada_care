 Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="{{ Request::is('/') ? 'active' : '' }}"> 
								<a href="{{url('/')}}"><i class="fe fe-home"></i> <span>الرئيسية</span></a>
							</li>
							<li class="{{ Request::is('appointment') ? 'active' : '' }}"> 
								<a href="{{url('appointments')}}"><i class="fe fe-layout"></i> <span>المواعيد</span></a>
							</li>
							
							<li  class="{{ Request::is('specialities') ? 'active' : '' }}"> 
								<a href="{{url('specialities')}}"><i class="fe fe-users"></i> <span>التخصصات</span></a>
							</li>
							
							
							<li  class="{{ Request::is('doctors') ? 'active' : '' }}"> 
								<a href="{{url('doctors')}}"><i class="fe fe-user-plus"></i> <span>الدكاتره</span></a>
							</li>
							

							<li  class="{{ Request::is('patients') ? 'active' : '' }}"> 
								<a href="{{url('patients')}}"><i class="fe fe-user"></i> <span>المرضى</span></a>
							</li>
							<li  class="{{ Request::is('roles') ? 'active' : '' }}"> 
								<a href="{{url('roles')}}"><i class="fe fe-user-plus"></i> <span>الصلاحيات</span></a>
							</li>
							<!-- <li  class="{{ Request::is('reviews') ? 'active' : '' }}"> 
								<a href="{{url('reviews')}}"><i class="fe fe-star-o"></i> <span>التقييمات</span></a>
							</li> -->
							<!-- <li  class="{{ Request::is('reviews') ? 'active' : '' }}"> 
								<a href="{{url('reviews')}}"><i class="fe fe-star-o"></i> <span>المراجعات</span></a>
							</li> -->
							<!-- <li  class="{{ Request::is('admin/transactions-list') ? 'active' : '' }}"> 
								<a href="transactions-list"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li> -->
							<!-- <li  class="{{ Request::is('articles') ? 'active' : '' }}"> 
								<a href="{{url('articles')}}"><i class="fe fe-user-plus"></i> <span>المقالات</span></a>
							</li> -->
							<li  class="{{ Request::is('sliders') ? 'active' : '' }}"> 
								<a href="{{url('sliders')}}"><i class="fe fe-user-plus"></i> <span>السلايدر</span></a>
							</li>
							
							<li  class="{{ Request::is('pannars') ? 'active' : '' }}"> 
								<a href="{{url('pannars')}}"><i class="fe fe-user-plus"></i> <span>البنرات</span></a>
							</li>
							<li   class="{{ Request::is('countries') ? 'active' : '' }}"> 
								<a href="{{url('countries')}}"><i class="fe fe-vector"></i> <span>الدول</span></a>
							</li>
							<li   class="{{ Request::is('cities') ? 'active' : '' }}"> 
								<a href="{{url('cities')}}"><i class="fe fe-vector"></i> <span>المدن</span></a>
							</li>



							<li   class="{{ Request::is('settings') ? 'active' : '' }}"> 
								<a href="{{url('settings')}}"><i class="fe fe-vector"></i> <span>الاعدادات</span></a>
							</li>
							<li   class="{{ Request::is('contact') ? 'active' : '' }}"> 
								<a href="{{url('contact')}}"><i class="fe fe-vector"></i> <span>معلومات التواصل</span></a>
							</li>
							<li   class="{{ Request::is('about') ? 'active' : '' }}"> 
								<a href="{{url('about')}}"><i class="fe fe-vector"></i> <span>من نحن</span></a>
							</li>
							<li   class="{{ Request::is('privacy') ? 'active' : '' }}"> 
								<a href="{{url('privacy')}}"><i class="fe fe-vector"></i> <span>سياسية الخصوصية</span></a>
							</li>
							<li  class="{{ Request::is('users') ? 'active' : '' }}"> 
								<a href="{{url('users')}}"><i class="fe fe-user-plus"></i> <span>المستخدمين</span></a>
							</li>
							<!-- <li  class="{{ Request::is('reports') ? 'active' : '' }}"> 
								<a href="{{url('reports')}}"><i class="fe fe-user-plus"></i> <span>التقارير</span></a>
							</li> -->
							
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> الصلاحيات</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/invoice-report') ? 'active' : '' }}" href="{{ url('admin/invoice-report') }}">الرول</a></li>

								</ul>
							</li> -->
							<!-- <li class="menu-title"> 
								<span>Pages</span>
							</li> -->
							<li  class="{{ Request::is('profile') ? 'active' : '' }}"> 
								<a href="{{url('profile')}}"><i class="fe fe-user-plus"></i> <span>حسابي</span></a>
							</li>
							<br/>
							<br/>
							
							
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a  class="{{ Request::is('admin/login') ? 'active' : '' }}" href="{{ url('admin/login') }}"> Login </a></li>
									<li><a  class="{{ Request::is('admin/register') ? 'active' : '' }}" href="{{ url('admin/register') }}"> Register </a></li>
									<li><a  class="{{ Request::is('admin/forgot-password') ? 'active' : '' }}" href="{{ url('admin/forgot-password') }}"> Forgot Password </a></li>
									<li><a  class="{{ Request::is('admin/lock-screen') ? 'active' : '' }}" href="{{ url('admin/lock-screen') }}"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/error-404') ? 'active' : '' }}" href="{{ url('admin/error-404') }}">404 Error </a></li>
									<li><a class="{{ Request::is('admin/error-500') ? 'active' : '' }}" href="{{ url('admin/error-500') }}">500 Error </a></li>
								</ul>
							</li> -->
							<!-- <li  class="{{ Request::is('admin/blank-page','admin/calendar') ? 'active' : '' }}"> 
								<a href="blank-page"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li class="{{ Request::is('admin/components') ? 'active' : '' }}"> 
								<a href="components"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/form-basic-inputs') ? 'active' : '' }}" href="{{ url('admin/form-basic-inputs') }}">Basic Inputs </a></li>
									<li><a class="{{ Request::is('admin/form-input-groups') ? 'active' : '' }}" href="{{ url('admin/form-input-groups') }}">Input Groups </a></li>
                                    <li><a class="{{ Request::is('admin/form-horizontal') ? 'active' : '' }}" href="{{ url('admin/form-horizontal') }}">Horizontal Form</a></li>
									<li><a class="{{ Request::is('admin/form-vertical') ? 'active' : '' }}" href="{{ url('admin/form-vertical') }}"> Vertical Form </a></li>
									<li><a class="{{ Request::is('admin/form-mask') ? 'active' : '' }}" href="{{ url('admin/form-mask') }}"> Form Mask </a></li>
									<li><a class="{{ Request::is('admin/form-validation') ? 'active' : '' }}" href="{{ url('admin/form-validation') }}"> Form Validation </a></li>
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/tables-basic') ? 'active' : '' }}" href="{{ url('admin/tables-basic') }}">Basic Tables </a></li>
									<li><a class="{{ Request::is('admin/data-tables') ? 'active' : '' }}" href="{{ url('admin/data-tables') }}">Data Table </a></li>
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li> -->
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar