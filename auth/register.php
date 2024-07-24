<?php
    require_once("../utils/session.php");

    if(isset($_SESSION['user'])){ 
        if($_SESSION['user']['is_admin']) {
            header("Location: /aiym/admin");
            die();
        } else {
            header("Location: /aiym/client");
            die();
        }
    }

    // The request is using the POST method
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // connect to db
        require_once("../utils/db.php");
        
        if(isset($_POST['do_register'])){
            if($_POST['password2'] != $_POST['password1']){
                $_SESSION['errors'][] = "Passwords do not match";
            } else {
                $user = R::findOne("users","email = ?", array($_POST['email']));

                if($user){
                    $_SESSION['errors'][] = "User already exists";
                } else {
                    $new_user = R::dispense("users");
                    $new_user->name = $_POST['name'];
                    $new_user->surname = $_POST['surname'];
                    $new_user->email = $_POST['email'];
                    $new_user->phone = $_POST['phone'];
                    $new_user->password = password_hash($_POST['password1'],PASSWORD_DEFAULT);

                    // create new user 
                    if(R::store($new_user)) {
                        $_SESSION['messages'][] = 'Registered successfully!';
                        header("Location: /aiym/auth/login.php");
                        die();
                    } else {
                        $_SESSION['errors'][] = 'Registration failed';
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("../sections/head.php"); ?>
    <title>Register | <?php echo $title; ?></title>
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
                    <h1 class="mb-0 bread">Register</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 h-100 justify-content-center align-items-center">
        <form class="col-10 col-md-6 col-lg-4 py-5" method="post">
            <div class="form-group">
                <h2 class="text-center text-dark py-3">Register</h2> 
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Surname</label>
                <input name="surname" type="text" class="form-control" placeholder="Surname" required>
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Phone</label>
                <input name="phone" type="text" class="form-control" placeholder="Phone" data-inputmask="'mask': '+7 (999) 999-99-99'" required >
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Password</label>
                <input name="password1" type="password" class="form-control" minlength="8" placeholder="Password" required>
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Confirm Password</label>
                <input name="password2" type="password" class="form-control" minlength="8" placeholder="Confirm Password" required>
            </div>
            <div class="form-group pt-4">
                <button class="btn btn-primary btn-lg btn-block w-50 btn-success mx-auto" type="submit" name="do_register">Register</button>
            </div>
            <div class="form-group w-75 mx-auto text-center">
                <a href="/aiym/auth/login.php">Already have an account? Login!</a>
            </div>
        </form> 
    </div>

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
