<?php $__env->startSection('content'); ?>


	<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">All Categories</h3>
			</div>

			<div class="box-body">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Modify</th>
						</tr>
						
					</thead>

					<tbody>

						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($cat->title); ?></td>
								<td><?php echo e($cat->description); ?></td>
								<td>
									<button class="btn btn-info" data-mytitle="<?php echo e($cat->title); ?>" data-mydescription="<?php echo e($cat->description); ?>" data-catid=<?php echo e($cat->id); ?> data-toggle="modal" data-target="#edit">Edit</button>
									/
									<button class="btn btn-danger" data-catid=<?php echo e($cat->id); ?> data-toggle="modal" data-target="#delete">Delete</button>
								</td>
							</tr>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>


				</table>				
			</div>
		</div>
	</div>



	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Add New
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Category</h4>
      </div>
      <form action="<?php echo e(route('category.store')); ?>" method="post">
      		<?php echo e(csrf_field()); ?>

	      <div class="modal-body">
				<?php echo $__env->make('category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="<?php echo e(route('category.update','test')); ?>" method="post">
      		<?php echo e(method_field('patch')); ?>

      		<?php echo e(csrf_field()); ?>

	      <div class="modal-body">
	      		<input type="hidden" name="category_id" id="cat_id" value="">
				<?php echo $__env->make('category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="<?php echo e(route('category.destroy','test')); ?>" method="post">
      		<?php echo e(method_field('delete')); ?>

      		<?php echo e(csrf_field()); ?>

	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="category_id" id="cat_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/category/index.blade.php ENDPATH**/ ?>