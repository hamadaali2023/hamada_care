<?php $__env->startSection('content'); ?> 
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">الصلاحيات</h3><br>
            <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                                <a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
                            </li>
                            
                            <li class="breadcrumb-item active">الصلاحيات
                            </li>
                          </ol> 
                        </div>
                      </div>
    </div>

                    
                    <div class="col-sm-5 col">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('اضافة صلاحية')): ?>
                             <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary float-right mt-2">إضافةش صلاحية</a>
                        <?php endif; ?>
                    </div>
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

                                    
        </div>
        <section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">قائمة الصلاحيات</h4>
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
              </div>
            </div>
          </div>

        </section>




<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>