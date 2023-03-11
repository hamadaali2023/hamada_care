
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

		<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('اضافة مستخدم')): ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.create')); ?>">اضافة مستخدم</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php if($user->Status == 'مفعل'): ?>
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div><?php echo e($user->Status); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div><?php echo e($user->Status); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(!empty($user->getRoleNames())): ?>
                                            <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="badge badge-success"><?php echo e($v); ?></label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('تعديل مستخدم')): ?>
                                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i></a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('حذف مستخدم')): ?>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="<?php echo e($user->id); ?>" data-username="<?php echo e($user->name); ?>"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?php echo e(route('users.destroy', 'test')); ?>" method="post">
                    <?php echo e(method_field('delete')); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
										
	</div>			
			
</div>


       




		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templ/resources/views/admin/userss/all.blade.php ENDPATH**/ ?>