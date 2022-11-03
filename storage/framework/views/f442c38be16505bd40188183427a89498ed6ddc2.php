<!DOCTYPE html>
<html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- plugins:css -->
    
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/themify-icons.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendor.bundle.addons.css')); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo e(asset('backend/images/logo_2H_tech.png')); ?>"/>
    </head>
    <body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        
            <?php echo $__env->make('include.navbar1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
            <?php echo $__env->make('include.navbar2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- partial -->

        
        <div class="main-panel">
            <div class="content-wrapper">
                 <?php echo $__env->yieldContent('contenu'); ?>
            </div>
            
                <?php echo $__env->make('include.adminfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        </div>

        
        



        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?php echo e(asset('backend/js/vendor.bundle.base.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/vendor.bundle.addons.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?php echo e(asset('backend/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/todolist.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/todolist.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/bootbox.min.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- End custom js for this page-->
        <script>
            $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Voulez-vous vraiment supprimer cet enregistrement ?", function(confirmed){
            if (confirmed){
                window.location.href = link;
                };
            });
            });
        </script>
    </body> 

</html>

<?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/layouts/appadmin.blade.php ENDPATH**/ ?>