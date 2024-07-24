<?php 
    require_once("session.php");

    // check users role
    if(isset($_SESSION['user'])){
        if(!$_SESSION['user']['is_admin']){   
            header('Location: /client');   
            die(); 
        }
    } else {
        header("Location: /auth/login.php");
        die();
    }
?>