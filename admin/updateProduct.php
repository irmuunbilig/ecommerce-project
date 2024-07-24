<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // post required
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $product = R::findOne('products', 'id = ?', [$_POST['product_id']]);

        if(!$product) {
            $product = R::dispense('products');
        }

        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->category_id = $_POST['category_id'];
        $product->price = $_POST['price'];

        // upload image
        $file = time()."_".basename($_FILES["image"]["name"]);
        $target_file = "../uploads/".$file;

        // store in uploads folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $product->image = $file;
        }  

        // store product
        if(R::store($product)) {
            $_SESSION['messages'][] = 'Success';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }

        header('Location: /aiym/admin/products.php');
        die();
    }

    // get product
    $product = R::findOne('products', 'id = ?', [$_GET['product_id']]);
    
    // get categories
    $categories = R::findAll('categories');
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
                                <h2 class="pageheader-title">Update product</h2>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <form action="/aiym/admin/updateProduct.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="product_id" value="<?php echo $product->id ?? '' ?>">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <br>
                                            <?php 
                                                if(isset($product->image) && $product->image){ ?>
                                                    <img src="../uploads/<?php echo $product->image ?? '' ?>" alt="image" class="img-fluid w-25">
                                                    <br><br>
                                                <?php }
                                            ?>
                                            <input type="file" name="image" accept="image/*" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $product->name ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Product price</label>
                                            <input type="number" name="price" class="form-control" min="1" value="<?php echo $product->price ?? '' ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category_id" class="form-control">
                                                <?php
                                                    if($categories) {
                                                        foreach ($categories as $category) { ?>
                                                            <option value="<?php echo $category->id ?? '' ?>" <?php echo (isset($product->category_id) && $category->id == $product->category_id) ? "selected" : "" ?>><?php echo $category->name ?? '' ?></option>
                                                        <?php }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" class="form-control" cols="30" rows="10" required><?php echo $product->description ?? '' ?></textarea>
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
