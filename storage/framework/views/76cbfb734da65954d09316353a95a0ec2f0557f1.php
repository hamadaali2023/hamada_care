
<?php $__env->startSection('content'); ?>	
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		    <h3 class="content-header-title mb-0 d-inline-block">الاوردرات</h3><br>
			<div class="row breadcrumbs-top d-inline-block">
			    <div class="breadcrumb-wrapper col-12">
				    <ol class="breadcrumb">
		            <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a></li>
				    <li class="breadcrumb-item active">الاوردرات</li>
				    </ol> 
		        </div>
			</div>
		</div>
		<!-- <div class="content-header-right col-md-6 col-12">
			<div class="dropdown float-md-right">
               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة دولة</a>
			</div>
	    </div> -->
		<?php if(session()->has('message')): ?>
           	<?php echo $__env->make('admin.includes.alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>                                    
	</div>
	<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">

              	<div class="card-header">
                  <h4 class="card-title">قائمة متلقي الخدمة</h4>
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
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<div class="table-responsive">
		                    <table class="table table-striped table-bordered keytable-integration">
		                         <thead>
									<tr>													
										<th>رقم الطلب</th>
										<th>الخدمة الرئيسية</th>
										<th>اسم متلقي الخدمة</th>
										<th>التاريخ</th>
										<th>الإجمالي</th>
									</tr>
								</thead>
							<tbody>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>																			
									<td class="text-center">						
										<a href="<?php echo e(url('order-details/'.$_item->id)); ?>"><?php echo e($_item->id); ?></a>
									</td>
									<td class="text-center">						
										<?php echo e($_item->category->name_ar); ?>

									</td>
									<td class="text-center">						
										<?php echo e($_item->patient->first_name); ?>

									</td>
									<td class="text-center">						
										<?php echo e($_item->date); ?><br>
										<?php echo e($_item->time); ?>

									</td>
									<td class="text-center">						
										<?php echo e($_item->total_price); ?>

									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
							</tbody>
		                    </table>
		                </div>			
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة دولة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo e(route('countries.store')); ?>" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي</label>
											<input type="text" name="name_ar" class="form-control" value="<?php echo e(old('name_ar')); ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="<?php echo e(old('name_en')); ?>">
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">أضافة دولة </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
    </section>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<script>
    
	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/orders/all.blade.php ENDPATH**/ ?>