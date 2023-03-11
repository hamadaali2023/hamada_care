<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

    <?php echo $__env->make('layout.admin_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

	<!-- nav -->

<?php if(!Route::is(['admin-login','register','forgot-password','lock-screen','error-404','error-500'])): ?>
	<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" 
	  		data-menu="vertical-menu-modern" data-col="2-columns">
		 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
	    	<div class="navbar-wrapper">
	    		<?php echo $__env->make('layout.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	    	</div>
  		</nav>

  		 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  		 	<?php echo $__env->make('layout.admin_sidbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  		 </div>	
<?php endif; ?>
	<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page" data-open="click" 
		data-menu="vertical-menu-modern" data-col="1-column">	
	<!-- nav -->
	


  	<!-- content -->
 	<div class="app-content content">
    	<div class="content-wrapper">
      		<div class="content-header row">
      		</div>
      		<div class="content-body">
      			<?php echo $__env->yieldContent('content'); ?>
			</div>
    	</div>
  	</div>

    <?php echo $__env->make('layout.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/findfamily/public_html/care/resources/views/layout/admin_main.blade.php ENDPATH**/ ?>