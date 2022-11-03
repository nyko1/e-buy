


<?php $__env->startSection('contenu'); ?>
	<div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(URL::to('/')); ?>">Home</a></span> <span>Products</span></p>
					<h1 class="mb-0 bread">Products</h1>
				</div>
			</div>
		</div>
	</div>

  <section class="ftco-section">
	  <div class="container">
		  <div class="row justify-content-center">
			  <div class="col-md-10 mb-5 text-center">
				  <ul class="product-category">
					  <li><a href="<?php echo e(URL::to('/shop')); ?>" class="<?php echo e((request()->is('shop')? 'active':'')); ?>">All</a></li>
					  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  	<li><a href="/select_par_cat/<?php echo e($categorie->category_name); ?>"  class="<?php echo e((request()->is('select_par_cat/'.$categorie->category_name)? 'active':'')); ?>"><?php echo e($categorie->category_name); ?></a></li>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </ul>
			  </div>
		  </div>

		  
			<div class="row">
				<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="#" class="img-prod"><img class="img-fluid" src="/storage/product_images/<?php echo e($produit->product_image); ?>" alt="Colorlib Template">
								<span class="status">50%</span>
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#"><?php echo e($produit->product_name); ?></a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="mr-2 price-dc"><?php echo e($produit->product_price/0.5); ?> FCFA</span><span class="price-sale"><?php echo e($produit->product_price); ?> FCFA</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="/ajouter_au_panier/<?php echo e($produit->id); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>


		  <div class="row mt-5">
		<div class="col text-center">
		  <div class="block-27">
			<ul>
			  <li><a href="#">&lt;</a></li>
			  <li class="active"><span>1</span></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li><a href="#">&gt;</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	  </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/client/shop.blade.php ENDPATH**/ ?>