<?php 
	require("utils/session.php");
	require_once('utils/db.php');
	// Set the title of the page
    $title = "Mongolian Shop - Home";
	$categories = R::findAll('categories');
	$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
	if ($category_id) {
		$category = R::findOne('categories', 'id = ?', [$category_id]);
		if ($category) {
			$products = R::find('products', 'category_id = ?', [$category->id]);
		} else {
			$products = R::findAll('products');
		}
	} else {
		$products = R::findAll('products');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require("sections/head.php"); ?>
	<title>Shop | <?php echo $title; ?></title>
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
						<li><a href="shop.php" class="<?php echo !$category_id ? 'active' : ''; ?>">All</a></li>
						<?php 
							if ($categories) {
								foreach ($categories as $cat) { ?>
									<li><a href="shop.php?category_id=<?php echo $cat->id; ?>" class="<?php echo ($cat->id == $category_id) ? 'active' : ''; ?>"><?php echo $cat->name; ?></a></li>
								<?php }
							}
						?>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php 
					if ($products) {
						foreach ($products as $product) { ?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a href="product/product-single.php?product_id=<?php echo $product->id ?? ''; ?>" class="img-prod">
										<img class="img-fluid" src="uploads/<?php echo $product->image ?? ''; ?>" alt="img">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="product/product-single.php?id=<?php echo $product->id ?? ''; ?>"><?php echo $product->name ?? ''; ?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price"><span><?php echo $product->price ?? ''; ?> MNT </span></p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<a href="cart/add.php?product_id=<?php echo $product->id ?? ''; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
													<span><i class="ion-ios-cart"></i></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }
					}
				?>
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
