<!DOCTYPE html>
<html>
<head>
  <!-- <link rel="stylesheet" href="//www.codermen.com/css/bootstrap.min.css">   -->
  <script src=//www.codermen.com/js/jquery.js></script>
</head>
<body>
<div >
  <div >
    <div >
      <div >
        <select id="country" name=category_id  >
        <option value="" selected disabled>Select</option>
         <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <option value="<?php echo e($key); ?>"> <?php echo e($country); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
      </div>
      <div >
        <label for="title">Select State:</label>
        <select name=state id="state" >
        </select>
      </div>
     
      <div >
        <label for="title">Select City:</label>
        <select name=city id="city" >
        </select>
      </div>
   </div>
  </div>
</div>
<script>
  $('#country').change(function(){
      var countryID = $(this).val();  
      if(countryID){
          $.ajax({
              type:"GET",
              url:"<?php echo e(url('get-state-list')); ?>?country_id="+countryID,
              success:function(res){        
                  if(res){
                    $("#state").empty();
                    $("#state").append('<option>Select</option>');
                    $.each(res,function(key,value){
                      $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                
                  }else{
                    $("#state").empty();
                  }
              }
          });
      }else{
        $("#state").empty();
        $("#city").empty();
      }   
  });
  $('#state').on('change',function(){
      var stateID = $(this).val();  
      if(stateID){
        $.ajax({
          type:"GET",
          url:"<?php echo e(url('get-city-list')); ?>?state_id="+stateID,
          success:function(res){        
            if(res){
              $("#city").empty();
              $.each(res,function(key,value){
                $("#city").append('<option value="'+key+'">'+value+'</option>');
              });
            }else{
              $("#city").empty();
            }
          }
        });
      }else{
        $("#city").empty();
      }
    
  });
</script>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rtl/resources/views/drop.blade.php ENDPATH**/ ?>