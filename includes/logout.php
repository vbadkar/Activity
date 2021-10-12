<?php
    session_start();
    unset($_SESSION['sessionId']);
    unset($_SESSION['sessionUser']);
    session_destroy();
    setcookie('cookieuser','',time()-86400,'/');
    setcookie('cookieuserid','',time()-86400,'/');
    http_response_code(301);
    header("Location: ../homepage");
    exit();
?>
