	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">
		
			<!-- Logo -->
			<div class="header-left">
				<a href="index_admin" class="logo">
					<img src="<?php echo e(asset('assets_admin/img/settings/'.$contact->logo)); ?>" alt="Logo">
				</a>
				<!-- <h1 class="logo" style="    color: #0ec2e7;">Espitalia</h1> -->
				<!-- <h1 class="logo logo-small" style="    color: #0ec2e7;">Espitalia</h1> -->
				<a href="index_admin" class="logo logo-small">
					<img src="<?php echo e(asset('assets_admin/img/settings/'.$contact->logo)); ?>" alt="Logo" width="30" height="30">
				</a>
			</div>
			<!-- /Logo -->
			
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>
			
			<!-- <div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div> -->
			
			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->
			
			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">
							<?php echo e($count); ?>

						</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">الاشعارات</span>
							<!-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a> -->
						</div>
						<div class="noti-content">
							<ul class="notification-list">
							<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
								<?php $__currentLoopData = $_item->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
									
									<li class="notification-message">
										<a href="<?php echo e(url('getusernot')); ?>">
											<div class="media">
												<span class="avatar avatar-sm">
													
													<?php if($_item->photo !=null): ?>
        										        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo e(asset('assets_admin/img/patients/'.$_item->photo)); ?>">
        										    <?php else: ?>        									             
        									             <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo e(asset('assets_admin/img/profile_image.png')); ?>">
        										    <?php endif; ?>
												</span>
												<div class="media-body">
													<p class="noti-details">
														<span class="noti-title"><?php echo e($_item->first_name_ar); ?></span>
													</p>
													<p class="noti-time">
														<span class="notification-time"><?php echo e($_items->data['data']); ?></span>
													</p>
												</div>
											</div>
										</a>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							
						
							</ul>
						</div>
						<!-- <div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div> -->
					</div>
				</li>
				<!-- /Notifications -->
				
				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="<?php echo e(asset('assets_admin/img/users/'.Auth::user()->photo)); ?>" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="../assets_admin/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6><?php echo e(Auth::user()->name); ?></h6>
								<p class="text-muted mb-0"><?php echo e(Auth::user()->type); ?></p>
							</div>
						</div>
						<a class="dropdown-item" href="profile">حسابي</a>
						<a class="dropdown-item" href="settings">الاعدادات</a>
						<!-- <a class="dropdown-item" href="login">خروج</a> -->
  
						<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                        </a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>



					</div>
				</li>
				<!-- /User Menu -->
				
			</ul>
			<!-- /Header Right Menu -->
			
		</div>
		<!-- /Header --><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/layout/partials/header_admin.blade.php ENDPATH**/ ?>