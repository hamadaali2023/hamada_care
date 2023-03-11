<?php $__env->startSection('content'); ?> 




<?php if(session()->has('Add')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم اضافة الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('edit')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم تحديث بيانات الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('delete')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم حذف الصلاحية بنجاح",
                type: "error"
            });
        }

    </script>
<?php endif; ?>

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('اضافة صلاحية')): ?>
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('roles.create')); ?>">اضافة</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('عرض صلاحية')): ?>
                                            <a class="btn btn-success btn-sm"
                                                href="<?php echo e(route('roles.show', $role->id)); ?>">عرض</a>
                                        <?php endif; ?>
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('تعديل صلاحية')): ?>
                                            <a class="btn btn-primary btn-sm"
                                                href="<?php echo e(route('roles.edit', $role->id)); ?>">تعديل</a>
                                        <?php endif; ?>

                                        <?php if($role->name !== 'owner'): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('حذف صلاحية')): ?>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                                $role->id], 'style' => 'display:inline']); ?>

                                                <?php echo Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']); ?>

                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
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
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templ/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>