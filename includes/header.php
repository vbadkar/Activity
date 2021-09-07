<?php
    require_once "includes/database.php";
    require_once "includes/register_validate.php";
    require_once "includes/login_validate.php";
    session_start();
    $sql="SELECT * FROM posts";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $category=$row['category'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
            <div class='logo'>
                <h1>Vozga</h1>
            </div>
            <img class='hamburger' src='images/hamburger.png' alt='hamburger'></img>
            <ul class='list'>
                    <li>
                        <form action="search.php" method="get">
                            <input class="search-text" type="text" name="search" placeholder="Search" autocomplete="off">
                            <button class="search-button"  type="submit" name="search-button">
                                <span><i class="fas fa-search" style="color:black;"></i></span></button>
                        </form>
                    </li>
                    <li><a>Category<i class="fas fa-chevron-down" style="color:black; font-size:1.2rem; padding:5px;"></i></a>
                      <ul>
                          <li><a href="category.php?category=Food">Food</a></li>
                          <li><a href="category.php?category=Music">Music</a></li>
                          <li><a href="category.php?category=Sports">Sports</a></li>
                          <li><a href="category.php?category=Gymnastics">Gymnastics</a></li>
                          <li><a href="category.php?category=Travel">Travel</a></li>
                      </ul>
                    </li>
                    <li><a href='homepage.php'>Home</a></li>
                    <li><a href='register.php'>Register</a></li>
                    <li><a href='login.php'>Login</a></li>
            </ul>
    </header>
    <script src='script.js'></script>