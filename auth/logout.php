<?php 
    session_start();

    // Deleting all session variables
    $_SESSION = array();

    // Delete all cookies
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    
    header("Location: /aiym/auth/login.php");
    exit();
?>
