<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // find category
    $category = R::findOne('categories', 'id = ?', [$_GET['category_id']]);

    // if category exists
    if($category) {
        // delete category
        if(R::trash($category)) {
            $_SESSION['messages'][] = 'Success';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }
    }

    // redirect back
    header('Location: /aiym/admin/categories.php');
    die();
?>
