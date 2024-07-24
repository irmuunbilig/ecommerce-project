<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    $categories = R::findAll('categories', 'ORDER BY id DESC');
    $site_title = "Mongolian Shop";
?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require("partials/head.php"); ?>
    <title>Categories | <?php echo $title; ?></title>
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
                                <h2 class="pageheader-title">Categories</h2>
                                <a href="updateCategory.php" class="btn btn-lg btn-success">Add</a>
                            </div>

                            <?php 
                                if($_SESSION['errors']) { ?>
                                    <div class="alert alert-danger">
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
                            
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0">Category name</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if($categories) {
                                                        foreach ($categories as $category) { ?>
                                                            <tr>
                                                                <td><?php echo $category->id ?? '' ?></td>
                                                                <td>
                                                                    <div class="m-r-10"><img src="../uploads/<?php echo $category->image ?? '' ?>" alt="category" class="rounded" width="45"></div>
                                                                </td>
                                                                <td><?php echo $category->name ?? '' ?></td>
                                                                <td>
                                                                    <a href="/aiym/admin/deleteCategory.php?category_id=<?php echo $category->id ?? '' ?>" class="btn btn-danger">Delete</a>
                                                                    <a href="/aiym/admin/updateCategory.php?category_id=<?php echo $category->id ?? '' ?>" class="btn btn-warning">Edit</a>
                                                                </td>
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
