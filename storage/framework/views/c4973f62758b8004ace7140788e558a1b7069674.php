

<!DOCTYPE html>
<html lang="en">
    <head>
      <title>NykoTech E-commerce</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/open-iconic-bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">
      
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">

      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">

      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/ionicons.min.css')); ?>">

      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datepicker.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.timepicker.css')); ?>">

      
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/flaticon.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/icomoon.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    </head>

    <body class="goto-here">
      <div class="py-1 bg-primary">
        <div class="container">
          <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
              <div class="row d-flex">
                <div class="col-md pr-4 d-flex topper align-items-center">
                  <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                  <span class="text">+225 0707 2171 59</span>
                </div>
                <div class="col-md pr-4 d-flex topper align-items-center">
                  <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                  <span class="text">nykotech@gmail.com</span>
                </div>
                <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                  <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
        <?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      

  
      <?php echo $__env->yieldContent('contenu'); ?>
  

  
  <?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.easing.1.3.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.animateNumber.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/scrollax.min.js')); ?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo e(asset('frontend/js/google-map.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
  
  <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/layouts/app1.blade.php ENDPATH**/ ?>