<?php
    session_start();

    unset($_SESSION['loggedIn']);
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    
    session_destroy();
    
    header('location: ./login.php');
    die();

?>