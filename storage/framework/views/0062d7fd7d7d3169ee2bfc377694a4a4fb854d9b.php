<?php $__env->startSection('content'); ?>	

 
	<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Invoice Template</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Invoice</a>
                </li>
                <li class="breadcrumb-item active">Invoice Template
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>
              <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
              <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
          </div>
        </div>
      </div>
    <div class="content-body">
        <section class="card">
          <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
              <div class="col-md-6 col-sm-12 text-center text-md-left">
                <div class="media">
                <img src="<?php echo e(asset('assets_admin/img/settings/'.$contact->logo)); ?>" width="100px" alt="company logo" class=""/>
                  <div class="media-body">
                    <ul class="ml-2 px-0 list-unstyled">
                      <li class="text-bold-800">اسم الطالب : <?php echo e($patient->first_name); ?></li>
                      
                      <?php $__currentLoopData = $patient_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient_location_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($patient_location_item->country); ?>,</li>
                        <li><?php echo e($patient_location_item->city); ?>,</li>
                        <li><?php echo e($patient_location_item->location_name); ?>,</li>
                        <li><?php echo e($patient_location_item->street); ?>,</li>
                        <li><?php echo e($patient_location_item->building_name); ?>,</li>
                        <li><?php echo e($patient_location_item->floor_number); ?>,</li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p>رقم طالب الخدمة : <?php echo e($order->id); ?></p>
                <!-- <p class="pb-3"> INV-<?php echo e($order->id); ?></p> -->
                <p>الإجمالي : <?php echo e($doctor_service_price_total); ?> $</p>
                <p><span class="text-muted">تاريخ الطلب :</span> <?php echo e($order->date); ?></p>
                <p><span class="text-muted">الوقت :</span> <?php echo e($order->time); ?></p>
                <p><span class="text-muted">الحالة :</span>
                  <?php if($order->status==0): ?>  
                    قيد المراجعة 
                  <?php elseif($order->status==1): ?>
                    تم الموافقة على الاطلب من مقدم الخدمة
                  <?php elseif($order->status==2): ?>
                    تم رفض الطلب
                  <?php else: ?>
                   تم الإكتمال الطلب  
                  <?php endif; ?> 
                </p>
                <!-- <ul class="px-0 list-unstyled">
                  <li>Total</li>
                  <li class="lead text-bold-800">$ <?php echo e($doctor_service_price_total); ?></li>
                </ul> -->
              </div>
            </div>
            <!--/ Invoice Company Details -->
            <!-- Invoice Customer Details -->
            <div id="invoice-customer-details" class="row pt-2">
              <div class="col-sm-12 text-center text-md-left">
               
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-left">
              	<p class="text-muted">الرسالة :  <?php echo e($order->message); ?></p>
                <!-- <ul class="px-0 list-unstyled">
                  <li class="text-bold-800"> <?php echo e($order->message); ?></li>
                  
                </ul> -->
                <p class="text-muted">العنوان</p>
                <ul class="px-0 list-unstyled">
                  <li class="text-bold-800"> <?php echo e($order->message); ?></li>
                  
                </ul>
              </div>
              <!-- <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p>
                  <span class="text-muted">تاريخ الطلب :</span> <?php echo e($order->date); ?></p>
                <p>
                  <span class="text-muted">الوقت :</span> <?php echo e($order->time); ?></p>
                <p> <span class="text-muted">Due Date :</span> 10/05/2017</p>
              </div> -->
            </div>
            <!--/ Invoice Customer Details -->
            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table">

                    <thead>
                      	<tr>
                       	<?php if(!empty($subcategory)): ?>
                        	<th class="text-center">الخدمة عربي</th>
                          <th class="text-center">الخدمة إنجليزي</th>
                        	<th class="text-center">السعر</th>
                        	<th class="text-center">المدة</th>
                       	<?php else: ?>
                       		<th class="text-center">اسم المنتج</th>
                        	<th class="text-center">السعر</th>
                       	<?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($subcategory)): ?> 	
	                    <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                      	<tr>
		                        <td class="text-center"><?php echo e($_item->title_ar); ?></td>
                            <td class="text-center"><?php echo e($_item->title_en); ?></td>
		                        <td class="text-center"><?php echo e($_item->price); ?></td>
		                        <td class="text-center"><?php echo e($_item->duration); ?></td>
	                      	</tr>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    <?php else: ?>
                    	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      	<tr>
	                        <td class="text-center"><?php echo e($_item->title); ?></td>
	                        <td class="text-center"><?php echo e($_item->price); ?></td>
                      	</tr>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php endif; ?>	
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                  <p class="lead">طريقة الدفع :
                  <?php if($order->method_payment==1): ?>  
                    نقدي
                  <?php elseif($order->method_payment==2): ?>
                    عن طريق المحفظة
                  <?php elseif($order->method_payment==2): ?>
                    عن طريق افيزا
                  <?php endif; ?>  
                  </p>
                  <!-- <div class="row">
                    <div class="col-md-8">
                      <table class="table table-borderless table-sm">
                        <tbody>
                          <tr>
                            <td>Bank name:</td>
                            <td class="text-right">ABC Bank, USA</td>
                          </tr>
                          <tr>
                            <td>Acc name:</td>
                            <td class="text-right">Amanda Orton</td>
                          </tr>
                          <tr>
                            <td>IBAN:</td>
                            <td class="text-right">FGS165461646546AA</td>
                          </tr>
                          <tr>
                            <td>SWIFT code:</td>
                            <td class="text-right">BTNPP34</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div> -->
                </div>
               <!--  <div class="col-md-5 col-sm-12">
                  <p class="lead">Total due</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Sub Total</td>
                          <td class="text-right">$ 14,900.00</td>
                        </tr>
                        <tr>
                          <td>TAX (12%)</td>
                          <td class="text-right">$ 1,788.00</td>
                        </tr>
                        <tr>
                          <td class="text-bold-800">Total</td>
                          <td class="text-bold-800 text-right"> $ 16,688.00</td>
                        </tr>
                        <tr>
                          <td>Payment Made</td>
                          <td class="pink text-right">(-) $ 4,688.00</td>
                        </tr>
                        <tr class="bg-grey bg-lighten-4">
                          <td class="text-bold-800">Balance Due</td>
                          <td class="text-bold-800 text-right">$ 12,000.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center">
                    <p>Authorized person</p>
                    <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"
                    />
                    <h6>Amanda Orton</h6>
                    <p class="text-muted">Managing Director</p>
                  </div>
                </div> -->
              </div>
            </div>
            <!-- Invoice Footer -->
            <div id="invoice-footer">
              <div class="row">
                <div class="col-md-7 col-sm-12">
                  <h6>Terms & Condition</h6>
                  <p>You know, being a test pilot isn't always the healthiest business
                    in the world. We predict too much for the next year and yet far
                    too little for the next 10.</p>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                	<div class="dropdown float-md-right">
		               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">إختار مقدم الخدمة </a>
					</div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
					<div class="dropdown float-md-right">
		               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة دولة</a>
					</div>
			    </div> -->
              </div>
            </div>
            <!--/ Invoice Footer -->
          </div>









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
									<div class="col-md-12 ">
										<div class="form-group">
											<label>الدولة عربي</label>
					            <fieldset class="form-group">
                        <select class="single-select-box selectivity-input" id="single-select-box" data-placeholder="No city selected"
                        name="traditional[single]">
                        <?php if(!empty($alldoctors_for_this_services)): ?> 
                          <?php $__currentLoopData = $alldoctors_for_this_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($_item->first_name); ?> <?php echo e($_item->last_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        <?php endif; ?> 
                        </select>
                      </fieldset>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="<?php echo e(old('name_en')); ?>">
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">إرسال  </button>
							</form>
						</div>
					</div>
				</div>
			</div>
        </section>
      </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/orders/order_details.blade.php ENDPATH**/ ?>