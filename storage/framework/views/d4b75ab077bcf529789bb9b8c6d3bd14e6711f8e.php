<!-- <?php if(Session::has('error')): ?>
    <div class="row mr-2 ml-2" >
            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error"><?php echo e(Session::get('error')); ?>

            </button>
    </div>
<?php endif; ?> -->

<?php if(Session::has('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?php echo e(Session::get('error')); ?>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
                            <?php endif; ?> 
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/admin/includes/alerts/error.blade.php ENDPATH**/ ?>