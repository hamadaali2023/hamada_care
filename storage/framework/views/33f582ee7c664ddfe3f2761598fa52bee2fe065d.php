 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title>activated </title>
 		<?php echo $__env->make('layout.partials.head_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 	</head>
 	<body background="white">
	 	<div class="content container-fluid" style="padding: 100px; "  >
	 		<?php if(Session::has('message')): ?>
		 		<div class="alert alert-success">
		        <strong>حسناً</strong> <?php echo e(session()->get('message')); ?> يرجى الرجوع للتطبيق لتسجيل الدخول
			    </div>
		    <?php endif; ?>              
		    <?php if(Session::has('error')): ?>
			    <div class="row mr-2 ml-2" >
			            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
			                    id="type-error"><?php echo e(Session::get('error')); ?>

			            </button>
			    </div>
			<?php endif; ?>


			<?php if(Session::has('error')): ?>
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo e(Session::get('error')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
		    <?php endif; ?> 
		    </div>    

 	</body>
 	</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/care/resources/views/emails/activated.blade.php ENDPATH**/ ?>