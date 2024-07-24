<?php 
    require_once("session.php");

    // checks if user authed
    if(!isset($_SESSION['user'])){
        header('Location: /auth/login.php');   
        die(); 
    }
?>