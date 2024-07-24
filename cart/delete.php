<?php 
    session_start();

    // delete from cart
    unset($_SESSION['cart']['products'][$_GET['product_id']]);
    
    $_SESSION['messages'][] = 'Deleted';


    // redirect back
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
?>