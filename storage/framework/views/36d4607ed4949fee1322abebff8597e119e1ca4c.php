<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	<?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>

	<a href="<?php echo e(asset('chats/1/')); ?>/<?php echo e($chats[$key]['id']); ?>"><?php echo e($chat->id); ?>C</a>	 
	</li>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</ul>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/perm/templl/resources/views/html.blade.php ENDPATH**/ ?>