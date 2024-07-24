<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    $user = R::findOne('users', 'id = ?', [$_SESSION['user']['id']]);
    $site_title = "Mongolian Shop";
?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require("partials/head.php"); ?>
	<title>Account | <?php echo $title; ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        
        <?php require_once("partials/navbar.php") ?>

        <?php require_once('partials/sidebar.php') ?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content "> 
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Account</h2>
                                <?php 
                                    if($_SESSION['errors']) { ?>
                                        <div class="alert alert-danager">
                                            <span><?php echo array_shift($_SESSION['errors']); ?></span>
                                        </div>
                                    <?php }
                                ?>
                                <?php 
                                    if($_SESSION['messages']) { ?>
                                        <div class="alert alert-success">
                                            <span><?php echo array_shift($_SESSION['messages']); ?></span>
                                        </div>
                                    <?php }
                                ?>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <form action="../client/updateUser.php" method="post">
                                        <h4>General information</h4>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $user->name ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Surname</label>
                                            <input type="text" name="surname" class="form-control" value="<?php echo $user->surname ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" name="address" class="form-control" value="<?php echo $user->address ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $user->email ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo $user->phone ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary" type="submit" style="border-radius: 0;">Save</button>
                                        </div>
                                    </form>
                                    <br>
                                    <form action="../client/changePassword.php" method="post">
                                        <h4>Change password</h4>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password1" minlength="8" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm password</label>
                                            <input type="password" name="password2" minlength="8" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary" type="submit" style="border-radius: 0;">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                </div>
            </div>
            
            <?php require_once('partials/copyright.php') ?>

        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    
    <?php require_once("partials/footer.php") ?>
</body>
 
</html>