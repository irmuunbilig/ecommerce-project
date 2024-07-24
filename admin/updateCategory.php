<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // post required
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $category = R::findOne('categories', 'id = ?', [$_POST['category_id']]);

        if(!$category) {
            $category = R::dispense('categories');
        }

        $category->name = $_POST['name'];

        // upload image
        $file = time()."_".basename($_FILES["image"]["name"]);
        $target_file = "../uploads/".$file;

        // store in uploads folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $category->image = $file;
        }  

        // store category
        if(R::store($category)) {
            $_SESSION['messages'][] = 'Success';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }

        header('Location: /aiym/admin/categories.php');
        die();
    }

    $category = R::findOne('categories', 'id = ?', [$_GET['category_id']]);
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
                                <h2 class="pageheader-title">Add category</h2>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <form action="/aiym/admin/updateCategory.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="category_id" value="<?php echo $category->id ?? '' ?>">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <br>
                                            <?php 
                                                if($category->image){ ?>
                                                    <img src="/uploads/<?php echo $category->image ?? '' ?>" alt="image" class="img-fluid w-25">
                                                    <br><br>
                                                <?php }
                                            ?>
                                            <input type="file" name="image" accept="image/*" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $category->name ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Save</button>
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
