<?php
    require_once("../utils/session.php");
    // Set the title of the page
    $title = "Mongolian Shop - Home";
    if(isset($_SESSION['user'])){ 
        if($_SESSION['user']['is_admin']) {
            header("Location: /aiym/admin/index.php");
            die();
        } else {
            header("Location: /aiym/client/index.php");
            die();
        }
    }

    // The request is using the POST method
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // connect to db
        require_once("../utils/db.php");

        // set empty array for errors
        $errors = array();

        if(isset($_POST['do_login'])){      
            $user = R::findOne("users","email = ?", array($_POST['email']));

            // if user exists
            if($user){
                // verifying user password
                if(password_verify($_POST['password'], $user->password)){
                    // getting user information

                    // use of two dimensional array
                    $_SESSION['user'] = [
                        'id'        => $user->id,
                        'name'      => $user->name,
                        'surname'   => $user->surname,
                        'address'   => $user->address,
                        'email'     => $user->email,
                        'phone'     => $user->phone,
                        'is_admin'  => (bool)((int)$user->is_admin == 1),
                    ];
                    
                    if((int)$user->is_admin == 1){
                        header("Location: /aiym/admin/index.php");
                        die();
                    } else {
                        header("Location: /aiym/client/index.php");
                        die();
                    }

                } else {
                    $_SESSION['errors'][] = 'Incorrect password';
                }
            } else {
                $_SESSION['errors'][] = 'Incorrect login';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("../sections/head.php"); ?>
    <title>Login | <?php echo $title; ?></title>
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
                    <h1 class="mb-0 bread">Login</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 h-100 justify-content-center align-items-center">
        <form class="col-10 col-md-6 col-lg-4 py-5" method="post">
            <div class="form-group">
                <h2 class="text-center text-dark py-3">Login</h2> 
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group w-75 mx-auto">
                <label for="formGroupExampleInput">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group pt-4">
                <button class="btn btn-primary btn-lg btn-block w-50 btn-success mx-auto" type="submit" name="do_login">Login</button>
            </div>
            <div class="form-group w-75 mx-auto text-center">
                <a href="/aiym/auth/register.php">Don't have account yet? Register!</a>
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
