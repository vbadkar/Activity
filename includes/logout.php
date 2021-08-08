<?php
    //require_once ("includes/login_validate.php");
    session_start();
    unset($_SESSION['sessionId']);
    unset($_SESSION['sessionUser']);
    session_destroy();
    header("Location: ../homepage.php?userloggedout");
    exit();
?>
