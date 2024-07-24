<?php 
    require("utils/session.php");
    require_once('utils/db.php');

    // Fetch last products
    $last_products = R::findAll('products');

    // Fetch contacts
    $contacts = R::findAll('contacts');

    // Set the title of the page
    $title = "Mongolian Shop - Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("sections/head.php"); ?>
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
    <title><?php echo $title; ?></title>
</head>

<body class="goto-here">
    <?php require("sections/navbar.php"); ?>

    <!-- slider section -->
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url('assets/images/bg_1.jpg');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('assets/images/bg_2.jpg');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over $100</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Always Fresh</h3>
                            <span>Product well package</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                 style="background-image: url('assets/images/category.jpg');">
                                <div class="text text-center">
                                    <h2>Vegetables</h2>
                                    <p>Protect the health of every home</p>
                                    <p><a href="shop.php?category_id=4" class="btn btn-primary">Shop now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                 style="background-image: url('assets/images/category-1.jpg');">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="shop.php?category_id=3">Fruits</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                 style="background-image: url('assets/images/category-2.jpg');">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="shop.php?category_id=4">Vegetables</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                         style="background-image: url('assets/images/category-3.jpg');">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="shop.php?category_id=5">Juices</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                         style="background-image: url('assets/images/category-4.jpg');">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="shop.php?category_id=6">Dried</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Products</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php 
                    if($last_products) {
                        foreach($last_products as $product) {?>
                            <div class="col-md-6 col-lg-3 ftco-animate">
                                <div class="product">
                                    <a href="product/product-single.php?product_id=<?php echo $product->id ?? '' ?>" class="img-prod">
                                        <img class="img-fluid" src="uploads/<?php echo $product->image ?? '' ?>" alt="img">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3 text-center">
                                        <h3><a href="product/product-single.php?id=<?php echo $product->id ?? '' ?>"><?php echo $product->name ?? '' ?></a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span><?php echo $product->price ?? '' ?> MNT</span></p>
                                            </div>
                                        </div>
                                        <div class="bottom-area d-flex px-3">
                                            <div class="m-auto d-flex">
                                                <a href="cart/add.php?product_id=<?php echo $product->id ?? '' ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
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

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <?php 
                            if($contacts) {
                                foreach($contacts as $contact) { ?>
                                    <div class="item">
                                        <div class="testimony-wrap p-4 pb-5">
                                            <div class="user-img mb-5">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                            <div class="text text-center">
                                                <p class="mb-5 pl-4 line"><?php echo $contact->message ?? '' ?></p>
                                                <span class="position"><?php echo $contact->name ?? '' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                        ?>
                    </div>
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
