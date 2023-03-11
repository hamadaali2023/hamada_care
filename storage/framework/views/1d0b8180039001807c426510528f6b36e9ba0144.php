

<?php $__env->startSection('content'); ?> 
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">الموظفين</h3><br>
            <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                                <a href="<?php echo e(url('admin/dashboard')); ?>">الرئيسية</a>
                            </li>
                            
                            <li class="breadcrumb-item active">الموظفين
                            </li>
                          </ol> 
                        </div>
                      </div>
    </div>

                    <div class="content-header-right col-md-6 col-12">
                      <div class="dropdown float-md-right">
                          
                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('اضافة مستخدم')): ?>
                                <a  class="btn btn-primary float-right mt-2" href="<?php echo e(route('users.create')); ?>">اضافة مستخدم</a></a>
                                <?php endif; ?>
                            </div>
                      </div>
                    </div>
                    
                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                                    
        </div>
        <section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">قائمة الموظفين</h4>
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
                                                                
                                                                <a href="<?php echo e(route('users.edit', $user->id)); ?>"  
                                                                    class="btn btn-sm bg-success-light"  >
                                                                <i class="fe fe-pencil"></i> تعديل
                                                            </a>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('حذف مستخدم')): ?>
                                                                <a class="btn btn-sm bg-danger-light" data-effect="effect-scale"
                                                                    data-user_id="<?php echo e($user->id); ?>" data-username="<?php echo e($user->name); ?>"
                                                                    data-toggle="modal" href="#delete" title="حذف">
                                                                    <i class="fe fe-trash"></i> حذف</a>
                                                                   
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


            <!-- /ADD Modal -->
            
            <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content">
                    <!--    <div class="modal-header">
                            <h5 class="modal-title">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>-->
                        <div class="modal-body">
                            <div class="form-content p-2">
                                <h4 class="modal-title">حذف</h4>
                                <p class="mb-4">هل متأكد من الحذف ؟</p>
                                <div class="row text-center">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-2">
                                        <form method="post" action="<?php echo e(route('users.destroy','test')); ?>">
                                             <?php echo csrf_field(); ?>
                                             <?php echo method_field('delete'); ?>
                                             <input type="hidden" name="user_id" id="user_id" >
                                            <button type="submit" class="btn btn-primary">حذف </button>
                                        </form>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Modal -->

        </section>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script>
    $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var user_id = button.data('user_id') 
          var modal = $(this)
          modal.find('.modal-body #user_id').val(user_id);
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/findfamily/public_html/care/resources/views/admin/users/all.blade.php ENDPATH**/ ?>