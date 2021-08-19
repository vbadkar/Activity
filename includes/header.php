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
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
            <div class='logo'>
                <h1>Blo<span>G</span></h1>
            </div>
            <img class='hamburger' src='images/hamburger.png' alt='hamburger'></img>
            <ul class='list'>
                    <li><a>Category</a>
                      
                    </li>
                    <li><a href='homepage.php'>Home</a></li>
                    <li><a href='register.php'>Register</a></li>
                    <li><a href='login.php'>Login</a></li>
            </ul>
    </header>
    <script src='script.js'></script>