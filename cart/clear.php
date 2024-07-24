<?php 
    session_start();

    // clear cart
    $_SESSION['cart']['products'] = array();


    $_SESSION['messages'][] = 'Cleared';


    // redirect back
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
?>