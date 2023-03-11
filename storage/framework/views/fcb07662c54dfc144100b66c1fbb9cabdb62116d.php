<!-- <?php if(Session::has('success')): ?>
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error"><?php echo e(Session::get('success')); ?>

            </button>
    </div>
<?php endif; ?>
 -->



        <div class="alert alert-success">
           <strong>حسناً</strong> <?php echo e(session()->get('message')); ?> 
        </div>
                  


<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/admin/includes/alerts/success.blade.php ENDPATH**/ ?>