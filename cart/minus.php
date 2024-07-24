<?php 
    session_start();

    // minus from cart
    $_SESSION['cart']['products'][$_GET['product_id']]--;

    $_SESSION['messages'][] = "Updated";

    // redirect back
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
?>