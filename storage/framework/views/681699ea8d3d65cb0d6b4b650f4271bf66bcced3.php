<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<style type="text/css">
	
</style>
<style>
.content {
  position: relative;
  text-align: center;
  color: white;
}

.bottom-left {
  position: absolute;
    bottom: 13%;
    left: 31%;
}

.top-left {
  position: absolute;
  top: 12%;
  left: 31%;
}

.top-right {
  position: absolute;
  top: 12%;
  right: 31%;
}

.bottom-right {
  position: absolute;
  bottom: 13%;
  right: 31%;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<div class="page-wrapper">
               
				 
				 <div class="content">
				 	<img src="../assets_admin/img/card.jpg" alt="Snow" style="width:100%;">
				 	<div class="bottom-left">
				  		<div class="col-md-12">
							<div class="card" style="background-color: #4a5ab1bd; border-radius: 0px 84px 0px 84px;">
								<div class="card-body">
									<div class="avatar avatar-xxl">
										<h3 style="padding-top: 26px;"><a href="<?php echo e(url('patients-appointments')); ?>">تقرير عن المريض</a></h3>
								</div>						
								</div>
							</div>
						</div>
				    </div>
				  <div class="top-left">
				  		<div class="col-md-12 col-xs-12">
							<div class="card" style="  background-color: #4a5ab1bd;  border-radius: 84px 0px  84px  0px; ">										
								<div class="card-body">
									<div class="avatar avatar-xxl">
										<h3 style="padding-top: 26px;"><a href="<?php echo e(url('doctors-appointments')); ?>">تقارير عن الدكتور</a></h3>
								</div>						
								</div>
							</div>
						</div>
				  </div>
				  <div class="top-right">
				  		<div class="col-md-12">
							<div class="card" style="  background-color: #4a5ab1bd;  border-radius: 0px 84px 0px 84px;">										
								<div class="card-body">
									<div class="avatar avatar-xxl">
										<h3 style="padding-top: 26px;"><a href="<?php echo e(url('doctors-appointments')); ?>">تقارير عن الدكتور</a></h3>
								</div>						
								</div>
							</div>
						</div>
				  </div>
				  <div class="bottom-right">
				  	<div class="col-md-12">
							<div class="card" style=" background-color: #4a5ab1bd;   border-radius: 89px 0px  89px 0px; ">										
								<div class="card-body">
									<div class="avatar avatar-xxl">
										<h3 style="padding-top: 26px;"><a href="<?php echo e(url('doctors-appointments')); ?>">تقارير عن الدكتور</a></h3>
								</div>						
								</div>
							</div>
						</div>
				  </div>
				 </div>
				  

			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/reports/reports.blade.php ENDPATH**/ ?>