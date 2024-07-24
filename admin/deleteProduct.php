<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // find product
    $product = R::findOne('products', 'id = ?', [$_GET['product_id']]);

    // if product exists
    if($product) {
        // delete product
        if(R::trash($product)) {
            $_SESSION['messages'][] = 'Success';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }
    }

    // redirect back
    header('Location: /aiym/admin/products.php');
    die();
?>