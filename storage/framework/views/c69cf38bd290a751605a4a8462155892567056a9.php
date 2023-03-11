

<?php $__env->startSection('content'); ?>		
			
		<!-- /Main Wrapper -->



<div id="crypto-stats-3" class="row">
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">

                    <div class="col-2"><a href="<?php echo e(url('instructor/stories')); ?>">
                      <h1 style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;
                        }">B</h1></a>
                    </div>
                    <div class="col-5 pl-2">
                        <a href="<?php echo e(url('instructor/stories')); ?>">
                            <h4>مقدمي الخدمات</h4>
                            <h6 class="text-muted">عدد مقدمي الخدمات</h6>
                        </a>
                    </div>
                    <div class="col-5 text-right">
                        <a href="<?php echo e(url('instructor/stories')); ?>">
                            <h4><?php echo e($doctorsCount); ?> </h4>
                        </a>
                      <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
                    </div>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="btc-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1 style="     color: white;
                            border-radius: 30px;
                            padding: 6px 14px 6px 31px;
                            background-color: #78909C !important;
                        }">S</h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>متلقي الخدمة</h4>
                      <h6 class="text-muted">عدد متلقي الخدمة</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4><?php echo e($patientsCount); ?>

                          
                      </h4>
                      <!--<h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="eth-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1 style="     color: white;
                            border-radius: 30px;
                            padding: 6px 14px 6px 31px;
                            background-color: #1E9FF2 !important;
                        }">O</h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>الاوردرات</h4>
                      <h6 class="text-muted">عدد الاوردات</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4><?php echo e($patientsCount); ?>

                         
                      </h4>
                      <!--<h6 class="danger">20% <i class="la la-arrow-down"></i></h6>-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="xrp-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
	  
<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/index_admin.blade.php ENDPATH**/ ?>