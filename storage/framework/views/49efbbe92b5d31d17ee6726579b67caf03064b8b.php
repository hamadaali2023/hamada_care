 Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('/')); ?>"><i class="fe fe-home"></i> <span>الرئيسية</span></a>
							</li>
							<li class="<?php echo e(Request::is('appointment') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('appointments')); ?>"><i class="fe fe-layout"></i> <span>المواعيد</span></a>
							</li>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specialities')): ?>
							<li  class="<?php echo e(Request::is('specialities') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('specialities')); ?>"><i class="fe fe-users"></i> <span>التخصصات</span></a>
							</li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctors')): ?>
							<li  class="<?php echo e(Request::is('doctors') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('doctors')); ?>"><i class="fe fe-user-plus"></i> <span>الدكاتره</span></a>
							</li>
							<?php endif; ?>

							<li  class="<?php echo e(Request::is('patients') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('patients')); ?>"><i class="fe fe-user"></i> <span>المرضى</span></a>
							</li>
							<li  class="<?php echo e(Request::is('roles') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('roles')); ?>"><i class="fe fe-user-plus"></i> <span>الصلاحيات</span></a>
							</li>
							<li  class="<?php echo e(Request::is('reviews') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('admin/reviews')); ?>"><i class="fe fe-star-o"></i> <span>التقييمات</span></a>
							</li>
							<li  class="<?php echo e(Request::is('reviews') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('admin/reviews')); ?>"><i class="fe fe-star-o"></i> <span>المراجعات</span></a>
							</li>
							<!-- <li  class="<?php echo e(Request::is('admin/transactions-list') ? 'active' : ''); ?>"> 
								<a href="transactions-list"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li> -->
							<li  class="<?php echo e(Request::is('articles') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('articles')); ?>"><i class="fe fe-user-plus"></i> <span>المقالات</span></a>
							</li>
							<li  class="<?php echo e(Request::is('sliders') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('sliders')); ?>"><i class="fe fe-user-plus"></i> <span>السلايدر</span></a>
							</li>
							
							<li  class="<?php echo e(Request::is('pannars') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('pannars')); ?>"><i class="fe fe-user-plus"></i> <span>البنرات</span></a>
							</li>
							<li   class="<?php echo e(Request::is('settings') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('settings')); ?>"><i class="fe fe-vector"></i> <span>الاعدادات</span></a>
							</li>
							<li  class="<?php echo e(Request::is('users') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('users')); ?>"><i class="fe fe-user-plus"></i> <span>المستخدمين</span></a>
							</li>
							<li  class="<?php echo e(Request::is('reports') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('reports')); ?>"><i class="fe fe-user-plus"></i> <span>التقارير</span></a>
							</li>
							
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> الصلاحيات</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/invoice-report') ? 'active' : ''); ?>" href="<?php echo e(url('admin/invoice-report')); ?>">الرول</a></li>

								</ul>
							</li> -->
							<!-- <li class="menu-title"> 
								<span>Pages</span>
							</li> -->
							<li  class="<?php echo e(Request::is('profile') ? 'active' : ''); ?>"> 
								<a href="<?php echo e(url('profile')); ?>"><i class="fe fe-user-plus"></i> <span>حسابي</span></a>
							</li>
							<br/>
							<br/>
							
							
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a  class="<?php echo e(Request::is('admin/login') ? 'active' : ''); ?>" href="<?php echo e(url('admin/login')); ?>"> Login </a></li>
									<li><a  class="<?php echo e(Request::is('admin/register') ? 'active' : ''); ?>" href="<?php echo e(url('admin/register')); ?>"> Register </a></li>
									<li><a  class="<?php echo e(Request::is('admin/forgot-password') ? 'active' : ''); ?>" href="<?php echo e(url('admin/forgot-password')); ?>"> Forgot Password </a></li>
									<li><a  class="<?php echo e(Request::is('admin/lock-screen') ? 'active' : ''); ?>" href="<?php echo e(url('admin/lock-screen')); ?>"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/error-404') ? 'active' : ''); ?>" href="<?php echo e(url('admin/error-404')); ?>">404 Error </a></li>
									<li><a class="<?php echo e(Request::is('admin/error-500') ? 'active' : ''); ?>" href="<?php echo e(url('admin/error-500')); ?>">500 Error </a></li>
								</ul>
							</li> -->
							<!-- <li  class="<?php echo e(Request::is('admin/blank-page','admin/calendar') ? 'active' : ''); ?>"> 
								<a href="blank-page"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li class="<?php echo e(Request::is('admin/components') ? 'active' : ''); ?>"> 
								<a href="components"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/form-basic-inputs') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-basic-inputs')); ?>">Basic Inputs </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-input-groups') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-input-groups')); ?>">Input Groups </a></li>
                                    <li><a class="<?php echo e(Request::is('admin/form-horizontal') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-horizontal')); ?>">Horizontal Form</a></li>
									<li><a class="<?php echo e(Request::is('admin/form-vertical') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-vertical')); ?>"> Vertical Form </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-mask') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-mask')); ?>"> Form Mask </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-validation') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-validation')); ?>"> Form Validation </a></li>
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/tables-basic') ? 'active' : ''); ?>" href="<?php echo e(url('admin/tables-basic')); ?>">Basic Tables </a></li>
									<li><a class="<?php echo e(Request::is('admin/data-tables') ? 'active' : ''); ?>" href="<?php echo e(url('admin/data-tables')); ?>">Data Table </a></li>
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
			<!-- /Sidebar<?php /**PATH /home/wadialry/zlitn.com/rytert/template-rtl/resources/views/layout/partials/nav_admin.blade.php ENDPATH**/ ?>