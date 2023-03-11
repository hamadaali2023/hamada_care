<?php $__env->startSection('content'); ?> 
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        
<!-- Internal Nice-select css  -->
        <link href="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet" />

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.index')); ?>">رجوع</a>
                            </div>
                        </div><br>

                        <?php echo Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]); ?>

                        <div class="">

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                    <?php echo Form::text('name', null, array('class' => 'form-control','required')); ?>

                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                    <?php echo Form::text('email', null, array('class' => 'form-control','required')); ?>

                                </div>
                            </div>

                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                <?php echo Form::password('password', array('class' => 'form-control','required')); ?>

                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                <?php echo Form::password('confirm-password', array('class' => 'form-control','required')); ?>

                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label">حالة المستخدم</label>
                                <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                    <option value="<?php echo e($user->Status); ?>"><?php echo e($user->Status); ?></option>
                                    <option value="مفعل">مفعل</option>
                                    <option value="غير مفعل">غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>نوع المستخدم</strong>
                                    <?php echo Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="mg-t-30">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>




        </div>
        <!-- row closed -->
        </div>
        <!-- Container closed -->
        </div>
        <!-- main-content closed -->


        <!-- Internal Nice-select js-->
        <script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')); ?>"></script>

        <!--Internal  Parsley.min js -->
        <script src="<?php echo e(URL::asset('assets/plugins/parsleyjs/parsley.min.js')); ?>"></script>
        <!-- Internal Form-validation js -->
        <script src="<?php echo e(URL::asset('assets/js/form-validation.js')); ?>"></script>

            
    </div>                  
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/admin/userss/edit.blade.php ENDPATH**/ ?>