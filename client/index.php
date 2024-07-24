<?php
require_once("../utils/session.php");
require_once("../utils/isAuthed.php");
// Set the title of the page
$title = "Mongolian Shop - Home";
// Connect to database
require_once('../utils/db.php');

// Get current user
if (isset($_SESSION['user']['id'])) {
    $user = R::findOne('users', 'id = ?', [$_SESSION['user']['id']]);
} else {
    // If user ID is not set, redirect to login page
    header("Location: /aiym/auth/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("../sections/head.php"); ?>
    <title>Account | <?php echo $title; ?></title>
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="goto-here">
    <?php require("../sections/navbar.php"); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('../assets/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Account</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/aiym/client/index.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/aiym/client/orders.php">My orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="/aiym/auth/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <h1>Account</h1>
                    <br>
                    <form action="/aiym/client/updateUser.php" method="post">
                        <h4>General information</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user->name) ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" name="surname" class="form-control" value="<?php echo htmlspecialchars($user->surname) ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($user->address) ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user->email) ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($user->phone) ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary" type="submit" style="border-radius: 0;">Save</button>
                        </div>
                    </form>
                    <br>
                    <form action="/aiym/client/changePassword.php" method="post">
                        <h4>Change password</h4>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password1" minlength="8" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm password</label>
                            <input type="password" name="password2" minlength="8" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary" type="submit" style="border-radius: 0;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php require("../sections/footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.easing.1.3.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
    <script src="../assets/js/jquery.stellar.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/jquery.animateNumber.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>
    <script src="../assets/js/scrollax.min.js"></script>
    <script src="../assets/js/google-map.js"></script>
    <script src="../assets/js/jquery.inputmask.min.js"></script>
    <script src="../assets/js/inputmask.binding.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
