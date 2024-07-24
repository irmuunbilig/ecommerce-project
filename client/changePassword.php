<?php 
    session_start();

    // check if user in system
    if(!isset($_SESSION['user'])){ 
        header("Location: /aiym/auth/login.php");
        die();
    }

    // connect to database
    require_once('../utils/db.php');

    // get current user
    $user = R::findOne('users', 'id = ?', [$_SESSION['user']['id']]);

    // redirect if user was not found
    if(!$user) {
        header('Location: /aiym/auth/logout.php');
        die();
    }

    if($_POST['password1'] != $_POST['password2']) {
        $_SESSION['errors'][] = 'Passwords are not same';
    } else {
     
        $user->password = password_hash($_POST['password1'], PASSWORD_DEFAULT);

        // save user
        if(R::store($user)) {
            $_SESSION['messages'][] = 'Changed successfully';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }
    }   

    // redirect back
    header('Location: /aiym/client/index.php');
    die();
?>
