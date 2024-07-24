<?php 
	require_once('../utils/session.php');

	// connect to database
	require_once('../utils/db.php');

	$product = R::findOne('products', 'id = ?', [$_GET['product_id']]);

	if(!$product) {
		header('Location: /shop.php');
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require("../sections/head.php"); ?>
	<title><?php echo $product->name ?? '' ?> | <?php echo $title; ?></title>
</head>

<body class="goto-here">
	<?php require_once("../sections/navbar.php"); ?>

	<div class="hero-wrap hero-bread" style="background-image: url('/uploads/<?php echo $product->image ?? '' ?>');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-0 bread"><?php echo $product->name ?? '' ?></h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<form action="/cart/add.php" method="get">
				<div class="row">
					<div class="col-lg-6 mb-5 ftco-animate">
						<a href="images/product-1.jpg" class="image-popup"><img src="/uploads/<?php echo $product->image ?? '' ?>" class="img-fluid" alt="image"></a>
					</div>
					<div class="col-lg-6 product-details pl-md-5 ftco-animate">
						<h3><?php echo $product->name ?? '' ?></h3>
						<p class="price"><span><?php echo $product->price ?? '' ?> MNT </span></p>
						<p>
							<?php echo $product->description ?? '' ?>
						</p>
						<div class="row mt-4">						
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="ion-ios-remove"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
									min="1" max="100" required>
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="ion-ios-add"></i>
									</button>
								</span>
							</div>
						</div>
						<input type="hidden" name="product_id" value="<?php echo $product->id ?? 0 ?>" required>
						<button type="submit" class="btn btn-success">Add to Cart</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<?php require("../sections/footer.php"); ?>

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

</body>

</html>