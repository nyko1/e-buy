<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">NykoTech</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
      <li class="nav-item active"><a href="<?php echo e(URL::to('/')); ?>" class="nav-link">Home</a></li>
      <li class="nav-item active"><a href="<?php echo e(URL::to('/shop')); ?>" class="nav-link">shop</a></li>
      
          
          <li class="nav-item cta cta-colored"><a href="<?php echo e(URL::to('/panier')); ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo e(Session::has('cart')? Session::get('cart')->totalQty:0); ?>]</a></li>

          <?php if(Session::has('client')): ?>
            <li class="nav-item active"><a href="<?php echo e(URL::to('/logout')); ?>" class="nav-link"><span class="fa-out"></span> Logout</a></li>
          <?php else: ?>
            <li class="nav-item active"><a href="<?php echo e(URL::to('/client_login')); ?>" class="nav-link"><span class="fa-user"></span> Login</a></li>
          <?php endif; ?>
           
        </ul>
      </div>
    </div>
</nav>
  <!-- END nav --><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/include/header.blade.php ENDPATH**/ ?>