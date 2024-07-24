<?php 
	require("utils/session.php");

	// connect database
	require_once('utils/db.php');
	// Set the title of the page
    $title = "Mongolian Shop - Home";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require("sections/head.php"); ?>
	<title>Cart | <?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="goto-here">
	<?php require("sections/navbar.php"); ?>

	<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-0 bread">My Cart</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>Product name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if (isset($_SESSION['cart']['products']) && $_SESSION['cart']['products']) {
										$cart_total = 0;
										foreach($_SESSION['cart']['products'] as $product_id => $quantity) { 
											$product = R::findOne('products', 'id = ?', [$product_id]);
											$cart_total += floatval($product->price) * intval($quantity);
											?>
											<tr class="text-center">
												<td class="image-prod">
													<div class="img" style="background-image:url('uploads/<?php echo $product->image ?? '' ?>');"></div>
												</td>

												<td class="product-name">
													<h3><?php echo $product->name ?? '' ?></h3>
												</td>

												<td class="price"><?php echo $product->price ?? '' ?> MNT </td>

												<td class="quantity">
													<div class="input-group mb-3 d-flex align-items-center">
														<a class="m-3 btn btn-sm btn-danger" style="border-radius: 0" href="cart/minus.php?product_id=<?php echo $product->id ?? '' ?>">-</a>
														<input type="text" name="quantity" class="form-control" value="<?php echo $quantity ?? 1 ?>" min="1" max="100">
														<a class="m-3 btn btn-sm btn-success" style="border-radius: 0" href="cart/add.php?product_id=<?php echo $product->id ?? '' ?>">+</a>
													</div>
												</td>

												<td class="total"><?php echo floatval($product->price) * intval($quantity) ?? '' ?></td>

												<td class="product-remove"><a href="cart/delete.php?product_id=<?php echo $product->id ?? '' ?>"><span class="ion-ios-close"></span></a></td>

											</tr>
										<?php }
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-lg-12 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<p class="d-flex total-price">
							<span>Total</span>
							<span><?php echo $cart_total ?? '' ?> MNT</span>
						</p>
					</div>
					<?php 
						if(!isset($_SESSION['user'])) {?>
							<div class="alert alert-primary">
								<span>Login to make order</span>
							</div>
						<?php } else { ?>
							<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
						<?php }
					?>
				</div>
			</div>
		</div>
	</section>

	<?php require("sections/footer.php"); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.animateNumber.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/scrollax.min.js"></script>
    <script src="assets/js/google-map.js"></script>
    <script src="assets/js/jquery.inputmask.min.js"></script>
    <script src="assets/js/inputmask.binding.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
