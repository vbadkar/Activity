<?php
    require_once "includes/database.php";
    require_once "includes/register_validate.php";
    require_once "includes/login_validate.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href='homepage.php'>Home</a></li>
                <li><a href='register.php'>Register</a></li>
                <li><a href='login.php'>Login</a></li>
            </ul>
        </nav>
    </header>