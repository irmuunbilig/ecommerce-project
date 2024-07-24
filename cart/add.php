<?php 
    session_start();

    // add to cart
    if($_GET['quantity']) {
        $_SESSION['cart']['products'][$_GET['product_id']] += intval($_GET['quantity']);
    } else {
        $_SESSION['cart']['products'][$_GET['product_id']]++;
    }

    $_SESSION['messages'][] = 'Added';

    // redirect back
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
?>