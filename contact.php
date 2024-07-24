<?php 
	require("utils/session.php");
  // Set the title of the page
  $title = "Mongolian Shop - Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require("sections/head.php"); ?>
	<title>Contact | <?php echo $title; ?></title>
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
          <h1 class="mb-0 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Address:</span> <?php echo $store_address; ?> </p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Phone:</span> <a href="tel:<?php echo $store_phone; ?>"><?php echo $store_phone; ?></a></p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Email:</span> <a href="mailto:<?php echo $store_email; ?>"><?php echo $store_email; ?></a></p>
          </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="saveContact.php" method="post" class="bg-white p-5 contact-form">
            <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input name="email" type="text" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="form-group">
              <input name="subject" type="text" class="form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
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
    <script src="assets/js/jquery.inputmask.min.js"></script>
    <script src="assets/js/inputmask.binding.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
