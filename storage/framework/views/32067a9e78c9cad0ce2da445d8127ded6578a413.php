<?php $__env->startSection('content'); ?>
    <div class="container">
        <chats :user="<?php echo e(auth()->user()); ?>"> </chats>
    </div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/chats.blade.php ENDPATH**/ ?>