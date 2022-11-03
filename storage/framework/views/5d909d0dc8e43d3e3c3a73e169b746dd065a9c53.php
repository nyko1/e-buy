


<?php $__env->startSection('contenu'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
	<div class="container">
	  <div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
			<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(URL::to('/')); ?>">Home</a></span> <span>Checkout</span></p>
		  <h1 class="mb-0 bread">Checkout</h1>
		</div>
	  </div>
	</div>
  </div>

  <section class="ftco-section">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-xl-7 ftco-animate">
					  <form action="<?php echo e(URL('/payer')); ?>" id="checkout-form" class="billing-form" method="POST">
						<?php echo e(csrf_field()); ?>

						  <h3 class="mb-4 billing-heading">Billing Details</h3>
						  	<?php if(Session::has('error')): ?>
								<div class="alert alert-danger">
									<?php echo e(Session::get('error')); ?>

									<?php echo e(Session::put('error',null)); ?>

								</div>
							<?php endif; ?>
				<div class="row align-items-end">
					<div class="col-md-12">
				  <div class="form-group">
					  <label for="fullname">Full Name</label>
					<input type="text" name="name" class="form-control" placeholder="Full Name">
				  </div>
				</div>
				
			  <div class="w-100"></div>
				  <div class="col-md-6">
					<div class="form-group">
						<label for="card-name">Name on Card</label>
					  <input type="text" class="form-control" name="card_name" placeholder="Card Name" id="card-name">
				  </div>
				</div>
				  <div class="col-md-6">
					<div class="form-group">
						<label for="card-number">Card Number</label>
					<input type="text" class="form-control" name="card_number" placeholder="Card Number" id="card-number">
				  </div>
				</div>
				  <div class="w-100"></div>
				  <div class="col-md-6">
					  <div class="form-group">
					  <label for="card-expiry-month">Expiration Month</label>
					<input type="text" class="form-control" placeholder="Expiration month" id="card-expiry-month">
				  </div>
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
						<label for="card-expiry-year"> Expiration Year</label>
					<input type="text" class="form-control" placeholder="Expiration Year" id="card-expiry-year">
				  </div>
				  </div>
				  <div class="w-100"></div>
				  <div class="col-md-6">
					  <div class="form-group">
					  <label for="card-cvc">CVC</label>
					<input type="text" class="form-control"  placeholder="card-cvc" id="card-cvc" name="card_cvc">
				  </div>
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
						  <label for="phone">Phone</label>
					<input type="text" class="form-control" placeholder="EX: 07 07 217 159" name="phone">
				  </div>
				  </div>
				  <div class="w-100"></div>
				<div class="col-md-12">
				  <div class="form-group">
					  <label for="emailaddress">Address</label>
					<input type="text" name="adresse" class="form-control" placeholder="Ex: Cocody Riviera Palmeraie">
				  </div>
			  </div>
			  <div class="w-100"></div>
			  <div class="col-md-12">
				<p><?php echo Form::submit('Pay', ['class'=>'btn btn-primary']); ?></p>
				  <div class="form-group mt-4">
									  <div class="radio">
										<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										<label><input type="radio" name="optradio"> Ship to different address</label>
									  </div>
								  </div>
			  </div>
			  </div>
			</form><!-- END -->
				  </div>
				  <div class="col-xl-5">
			<div class="row mt-5 pt-3">
				<div class="col-md-12 d-flex mb-5">
					<div class="cart-detail cart-total p-3 p-md-4">
						<h3 class="billing-heading mb-4">Cart Total</h3>
						<p class="d-flex">
								  <span>Subtotal</span>
								  <span>$20.60</span>
							  </p>
							  <p class="d-flex">
								  <span>Delivery</span>
								  <span>$0.00</span>
							  </p>
							  <p class="d-flex">
								  <span>Discount</span>
								  <span>$3.00</span>
							  </p>
							  <hr>
							  <p class="d-flex total-price">
								  <span>Total</span>
								  <span><?php echo e(Session::get('cart')->totalPrice); ?> FCFA</span>
							  </p>
							  </div>
				</div>
				<div class="col-md-12">
					<div class="cart-detail p-3 p-md-4">
						<h3 class="billing-heading mb-4">Payment Method</h3>
								  <div class="form-group">
									  <div class="col-md-12">
										  <div class="radio">
											 <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
										  </div>
									  </div>
								  </div>
								  <div class="form-group">
									  <div class="col-md-12">
										  <div class="radio">
											 <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
										  </div>
									  </div>
								  </div>
								  <div class="form-group">
									  <div class="col-md-12">
										  <div class="radio">
											 <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
										  </div>
									  </div>
								  </div>
								  <div class="form-group">
									  <div class="col-md-12">
										  <div class="checkbox">
											 <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
										  </div>
									  </div>
								  </div>
								 
							  </div>
				</div>
			</div>
		</div> <!-- .col-md-8 -->
	  </div>
	</div>
  </section> <!-- .section -->
<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script>
<script>
	$(document).ready(function(){

	var quantitiy=0;
	   $('.quantity-right-plus').click(function(e){
			
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
				
				$('#quantity').val(quantity + 1);

			  
				// Increment
			
		});

		 $('.quantity-left-minus').click(function(e){
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
		  
				// Increment
				if(quantity>0){
				$('#quantity').val(quantity - 1);
				}
		});
		
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/client/checkout.blade.php ENDPATH**/ ?>