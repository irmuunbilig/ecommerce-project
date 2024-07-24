<?php 
require_once("utils/session.php");
require_once("utils/isAuthed.php");

// connect database
require_once('utils/db.php');
// Set the title of the page
$title = "Mongolian Shop - Home";

$cart_total = 0;
// get cart
if (isset($_SESSION['cart']['products']) && !empty($_SESSION['cart']['products'])) {
    foreach($_SESSION['cart']['products'] as $product_id => $quantity) {
        $product = R::findOne('products', 'id = ?', [$product_id]);
        if ($product) {
            $cart_total += intval($quantity) * floatval($product->price);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("sections/head.php"); ?>
    <title>Checkout | <?php echo $title; ?></title>
</head>

<body class="goto-here">
    <?php require("sections/navbar.php"); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('/aiym/assets/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <form action="/aiym/placeOrder.php" method="post">
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input name="street" type="text" class="form-control"
                                        placeholder="House number and street name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="appartment" type="text" class="form-control"
                                        placeholder="Appartment, suite, unit etc: (optional)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span><?php echo $cart_total ?? '' ?> MNT </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_type" class="mr-2" value="cash" checked required> Cash</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_type" class="mr-2" value="bank" required> Direct Bank Tranfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_type" class="mr-2" value="check" required> Check Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_type" class="mr-2" value="kaspi" required> Kaspi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </form>
        </div>
    </section>

    <?php require("sections/footer.php"); ?>

    <!-- JS Files -->
    <script src="/aiym/assets/js/jquery.min.js"></script>
    <script src="/aiym/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/aiym/assets/js/popper.min.js"></script>
    <script src="/aiym/assets/js/bootstrap.min.js"></script>
    <script src="/aiym/assets/js/jquery.easing.1.3.js"></script>
    <script src="/aiym/assets/js/jquery.waypoints.min.js"></script>
    <script src="/aiym/assets/js/jquery.stellar.min.js"></script>
    <script src="/aiym/assets/js/owl.carousel.min.js"></script>
    <script src="/aiym/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/aiym/assets/js/aos.js"></script>
    <script src="/aiym/assets/js/jquery.animateNumber.min.js"></script>
    <script src="/aiym/assets/js/bootstrap-datepicker.js"></script>
    <script src="/aiym/assets/js/scrollax.min.js"></script>
    <script src="/aiym/assets/js/google-map.js"></script>
    <script src="/aiym/assets/js/jquery.inputmask.min.js"></script>
    <script src="/aiym/assets/js/inputmask.binding.js"></script>
    <script src="/aiym/assets/js/main.js"></script>
</body>

</html>
