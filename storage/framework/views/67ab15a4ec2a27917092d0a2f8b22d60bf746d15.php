<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.head2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body>
<?php echo $__env->make('layout.partials.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('layout.partials.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout.partials.footer2-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH C:\xampp\htdocs\doccure_landing\resources\views/layout/mainlayout2.blade.php ENDPATH**/ ?>