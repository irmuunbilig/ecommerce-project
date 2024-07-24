<hr>

<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5 justify-content-md-between">
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php echo $site_title; ?></h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $store_address; ?></span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo $store_phone; ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo $store_email; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- Removed the copyright and template credit text -->
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

<?php 
    // check errors array
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
        <div class="fixed-bottom col-lg-3 col-md-5 col-11 ml-auto">
            <?php foreach ($_SESSION['errors'] as $error) { ?>
                <div class="alert alert-danger mb-2">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
        </div>
    <?php }

    // check messages array
    if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) { ?>
        <div class="fixed-bottom col-lg-3 col-md-5 col-11 ml-auto">
            <?php foreach ($_SESSION['messages'] as $message) { ?>
                <div class="alert alert-success mb-2">
                    <?php echo $message; ?>
                </div>
            <?php } ?>
        </div>
    <?php }

    $_SESSION['messages'] = array();
    $_SESSION['errors'] = array();
?>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.easing.1.3.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/jquery.stellar.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/jquery.animateNumber.min.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script src="/assets/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/assets/js/google-map.js"></script>
<script src="/assets/js/inputmask/jquery.inputmask.min.js"></script>
<script src="/assets/js/inputmask/bindings/inputmask.binding.js"></script>
<script src="/assets/js/main.js"></script>
