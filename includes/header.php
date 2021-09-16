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
    <base href="http://localhost:8888/htdocs/Activity/">
    <link href="includes/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>

</head>
<body style="transform:none">
<div class="header-wrapper">
        <header>
            <div class='logo'>
                <h3>Vozga</h3>
            </div>
            <div class="search-form">
                        <div class="form-toggle">
                            <form action="search.php" method="get">
                                <input class="search-text" type="text" name="search" placeholder="Search" autocomplete="off" autofocus><span class="hide"><i class="fas fa-times"></i></span>
                            </form>
                        </div>
                        <div class="icon">
                            <span class="show"><i class="fas fa-search" style="color:black; font-size: 14px;font-weight: 600;"></i></span>
                        </div>  
                    </div>
                   
            <img class='hamburger' src='images/hamburger.png' alt='hamburger'></img>
            <ul class='list'>
                <li class="sub-list"><a>Category<i class="fas fa-chevron-down" style="color:black; font-size: 14px; font-weight: 600; padding:5px;"></i></a>
                    <ul>
                        <li><a href="category.php?category=Food">Food</a></li>
                        <li><a href="category.php?category=Music">Music</a></li>
                        <li><a href="category.php?category=Sports">Sports</a></li>
                        <li><a href="category.php?category=Gymnastics">Gymnastics</a></li>
                        <li><a href="category.php?category=Travel">Travel</a></li>
                    </ul>
                </li>
                <li><a href='homepage'>Home</a></li>
                <li><a href='register'>Register</a></li>
                <li><a href='login'>Login</a></li>
            </ul>
        </header>
    </div>
    <script>
        const button = document.querySelector('.icon');
        const search = document.querySelector('.form-toggle');
        const navBar = document.querySelector('.list');
        const hideBtn = document.querySelector('.hide');
        button.onclick=function(){
            search.classList.remove('inactive');
            search.classList.toggle('active');
            navBar.classList.toggle('inactive');
            navBar.classList.remove('active');
        }
        hideBtn.onclick=function(){
            search.classList.remove('active');
            search.classList.toggle('inactive');
            navBar.classList.toggle('active');
            navBar.classList.remove('inactive');
        }
    </script>