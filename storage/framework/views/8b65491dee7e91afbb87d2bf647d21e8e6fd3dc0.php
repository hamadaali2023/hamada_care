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
                    <br>
                    <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.index')); ?>">رجوع</a>
                            </div>
                        </div>
                    <div class="card-body">
                        

                        <?php echo Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id],'files' => 'true','enctype'=>'multipart/form-data']); ?>

                        <!-- <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" 
                                 action="<?php echo e(route('users.update',$user->id)); ?>" method="POST" 
                                                                name="le_form"  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?> -->
                        
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <?php echo Form::text('name', null, array('class' => 'form-control','required')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                        <?php echo Form::text('email', null, array('class' => 'form-control','required')); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                        <!-- <?php echo Form::password('password', array('class' => 'form-control','required')); ?> -->
                                        <input type="password" name="password" class="form-control" value="<?php echo e($user->password); ?>">
                                    </div>
                                </div>
                               <!--  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                        <?php echo Form::password('confirm-password', array('class' => 'form-control','required')); ?>

                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                </div> -->
                            </div>

                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">حالة المستخدم</label>
                                        <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                            <option value="<?php echo e($user->Status); ?>"><?php echo e($user->Status); ?></option>
                                            <option value="مفعل">مفعل</option>
                                            <option value="غير مفعل">غير مفعل</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                         <strong>نوع المستخدم</strong>
                                        <?php echo Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>الهاتف</label>
                                            <input type="text" name="mobile" class="form-control" value="<?php echo e($user->mobile); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" class="form-control" value="<?php echo e($user->address); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>الصورة</label>
                                <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets_admin/img/users/'.$user->photo)); ?>" alt="User Image" width="60px" height="60px">
                                <input type="file" name="photo" class="form-control">
                                <input type="hidden" name="url" class="form-control" value="<?php echo e($user->photo); ?>">
                            </div>

                        
                        <div class="mg-t-30">
                            <button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>

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



<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/template-rtl/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>