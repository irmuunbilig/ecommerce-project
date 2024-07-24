<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // get users
    $users = R::findAll('users', 'ORDER BY id DESC');
    $site_title = "Mongolian Shop";
?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require("partials/head.php"); ?>
	<title>Users | <?php echo $title; ?></title>
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
                                <h2 class="pageheader-title">Users</h2>
                            </div>

                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Name</th>
                                                    <th class="border-0">Surname</th>
                                                    <th class="border-0">Address</th>
                                                    <th class="border-0">Email</th>
                                                    <th class="border-0">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if($users) {
                                                        foreach ($users as $user) { ?>
                                                            <tr>
                                                                <td><?php echo $user->id ?? '' ?></td>
                                                                <td><?php echo $user->name ?? '' ?></td>
                                                                <td><?php echo $user->surname ?? '' ?></td>
                                                                <td><?php echo $user->address ?? '' ?></td>
                                                                <td><?php echo $user->email ?? '' ?></td>
                                                                <td><?php echo $user->phone ?? '' ?></td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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