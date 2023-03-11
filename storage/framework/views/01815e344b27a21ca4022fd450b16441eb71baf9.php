
	<!-- Loader -->
	<!-- <div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div> -->
	<!-- /Loader  -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="<?php echo e(Request::is('index') ? 'active' : ''); ?>">
								<a  href="index">Home</a>
							</li>
							<li class="has-submenu active">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php echo e(Request::is('doctor-dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('doctor-dashboard')); ?>"><a href="doctor-dashboard">Doctor Dashboard</a></li>
									<li class="<?php echo e(Request::is('appointments') ? 'active' : ''); ?>" href="<?php echo e(url('appointments')); ?>"><a href="appointments">Appointments</a></li>
									<li class="<?php echo e(Request::is('schedule-timings') ? 'active' : ''); ?>" href="<?php echo e(url('schedule-timings')); ?>"><a href="schedule-timings">Schedule Timing</a></li>
									<li class="<?php echo e(Request::is('my-patients') ? 'active' : ''); ?>" href="<?php echo e(url('my-patients')); ?>"><a href="my-patients">Patients List</a></li>
									<li class="<?php echo e(Request::is('patient-profile') ? 'active' : ''); ?>" href="<?php echo e(url('patient-profile')); ?>"><a href="patient-profile">Patients Profile</a></li>
									<li class="<?php echo e(Request::is('chat-doctor') ? 'active' : ''); ?>" href="<?php echo e(url('chat-doctor')); ?>"><a href="chat-doctor">Chat</a></li>
									<li class="<?php echo e(Request::is('invoices') ? 'active' : ''); ?>" href="<?php echo e(url('invoices')); ?>"><a href="invoices">Invoices</a></li>
									<li class="<?php echo e(Request::is('doctor-profile-settings') ? 'active' : ''); ?>" href="<?php echo e(url('doctor-profile-settings')); ?>"><a href="doctor-profile-settings">Profile Settings</a></li>
									<li class="<?php echo e(Request::is('reviews') ? 'active' : ''); ?>" href="<?php echo e(url('reviews')); ?>"><a href="reviews">Reviews</a></li>
									<li class="<?php echo e(Request::is('doctor-register') ? 'active' : ''); ?>" href="<?php echo e(url('doctor-register')); ?>"><a href="doctor-register">Doctor Register</a></li>
								</ul>
							</li>	
							<li class="has-submenu active">
								<a href="">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu active">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li class="<?php echo e(Request::is('map-grid') ? 'active' : ''); ?>" href="<?php echo e(url('map-grid')); ?>"><a href="map-grid">Map Grid</a></li>
											<li class="<?php echo e(Request::is('map-list') ? 'active' : ''); ?>" href="<?php echo e(url('map-list')); ?>"><a href="map-list">Map List</a></li>
										</ul>
									</li>
									<li class="<?php echo e(Request::is('search') ? 'active' : ''); ?>" href="<?php echo e(url('search')); ?>"><a href="search">Search Doctor</a></li>
									<li class="<?php echo e(Request::is('doctor-profile') ? 'active' : ''); ?>" href="<?php echo e(url('doctor-profile')); ?>"><a href="doctor-profile">Doctor Profile</a></li>
									<li class="<?php echo e(Request::is('booking') ? 'active' : ''); ?>" href="<?php echo e(url('booking')); ?>"><a href="booking">Booking</a></li>
									<li class="<?php echo e(Request::is('checkout') ? 'active' : ''); ?>" href="<?php echo e(url('checkout')); ?>"><a href="checkout">Checkout</a></li>
									<li class="<?php echo e(Request::is('booking-success') ? 'active' : ''); ?>" href="<?php echo e(url('booking-success')); ?>"><a href="booking-success">Booking Success</a></li>
									<li class="<?php echo e(Request::is('patient-dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('patient-dashboard')); ?>"><a href="patient-dashboard">Patient Dashboard</a></li>
									<li class="<?php echo e(Request::is('favourites') ? 'active' : ''); ?>" href="<?php echo e(url('favourites')); ?>"><a href="favourites">Favourites</a></li>
									<li class="<?php echo e(Request::is('chat') ? 'active' : ''); ?>" href="<?php echo e(url('chat')); ?>"><a href="chat">Chat</a></li>
									<li class="<?php echo e(Request::is('profile-settings') ? 'active' : ''); ?>" href="<?php echo e(url('profile-settings')); ?>"><a href="profile-settings">Profile Settings</a></li>
									<li class="<?php echo e(Request::is('change-password') ? 'active' : ''); ?>" href="<?php echo e(url('change-password')); ?>"><a href="change-password">Change Password</a></li>
								</ul>
							</li>		
							<li class="has-submenu active">
								<a href="">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php echo e(Request::is('voice-call') ? 'active' : ''); ?>" href="<?php echo e(url('voice-call')); ?>"><a href="voice-call">Voice Call</a></li>
									<li class="<?php echo e(Request::is('video-call') ? 'active' : ''); ?>" href="<?php echo e(url('video-call')); ?>"><a href="video-call">Video Call</a></li>
									<li class="<?php echo e(Request::is('search') ? 'active' : ''); ?>" href="<?php echo e(url('search')); ?>"><a href="search">Search Doctors</a></li>
									<li class="<?php echo e(Request::is('calendar') ? 'active' : ''); ?>" href="<?php echo e(url('calendar')); ?>"><a href="calendar">Calendar</a></li>
									<li class="<?php echo e(Request::is('components') ? 'active' : ''); ?>" href="<?php echo e(url('components')); ?>"><a href="components">Components</a></li>
									<li class="has-submenu">
										<a href="invoices">Invoices</a>
										<ul class="submenu">
											<li class="<?php echo e(Request::is('invoices') ? 'active' : ''); ?>" href="<?php echo e(url('invoices')); ?>"><a href="invoices">Invoices</a></li>
											<li class="<?php echo e(Request::is('invoice-view') ? 'active' : ''); ?>" href="<?php echo e(url('invoice-view')); ?>"><a href="invoice-view">Invoice View</a></li>
										</ul>
									</li>
									<li class="<?php echo e(Request::is('blank-page') ? 'active' : ''); ?>" href="<?php echo e(url('blank-page')); ?>"><a href="blank-page">Starter Page</a></li>
									<li class="<?php echo e(Request::is('login') ? 'active' : ''); ?>" href="<?php echo e(url('login')); ?>"><a href="login">Login</a></li>
									<li class="<?php echo e(Request::is('register') ? 'active' : ''); ?>" href="<?php echo e(url('register')); ?>"><a href="register">Register</a></li>
									<li class="<?php echo e(Request::is('forgot-password') ? 'active' : ''); ?>" href="<?php echo e(url('forgot-password')); ?>"><a href="forgot-password">Forgot Password</a></li>
								</ul>
							</li>
							<li class="has-submenu active">
                            <a href="">Blog <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class="<?php echo e(Request::is('blog-list') ? 'active' : ''); ?>" href="<?php echo e(url('blog-list')); ?>"><a href="blog-list">Blog List</a></li>
                                <li class="<?php echo e(Request::is('blog-grid') ? 'active' : ''); ?>" href="<?php echo e(url('blog-grid')); ?>"><a href="blog-grid">Blog Grid</a></li>
                                <li class="<?php echo e(Request::is('blog-details') ? 'active' : ''); ?>" href="<?php echo e(url('blog-details')); ?>"><a href="blog-details">Blog Details</a></li>
                            </ul>
                        </li>  
						<li class="<?php echo e(Request::is('http://localhost/doccure_admin/public/') ? 'active' : ''); ?>">
								<a href="http://localhost/doccure_admin/public/">Admin</a>
							</li>
							<li class="login-link">
								<a href="login">Login / Signup</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="login">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header --><?php /**PATH C:\xampp\htdocs\doccure_landing\resources\views/layout/partials/header1.blade.php ENDPATH**/ ?>