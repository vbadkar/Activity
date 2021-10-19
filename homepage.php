<?php
    require_once "includes/database.php";
    require_once "includes/createpost_validate.php";
    $base = "http://blog/";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo $base; ?>">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>

</head>
<body style="transform:none">
    <div class="homepage-header-wrapper">
        <header class="homeHeader">
            <div class='logo'>
                <h3>Vozga</h3>
            </div>
            <div class="search-form">
                <div class="form-toggle">
                    <form action="search.php" method="get">
                        <input class="search-text" type="text" name="search" placeholder="Search" autocomplete="off" autofocus required><span class="hide"><i class="fas fa-times"></i></span>
                    </form>
                </div>
                <div class="icon">
                    <span class="show"><i class="fas fa-search"></i></span>
                </div>
            </div>
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <div class="close">
                <i class="fas fa-times"></i>
            </div>
            <ul class='list'>
                <li>
                    <?php
                        if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){
                            $selEN = 'selected';
                        }else{
                            $selHI = 'selected';
                        }
                    ?>
                    <select id="lang" onchange="getSelectedValue();">
                        <option value="">Select Language</option>
                        <option value="en" <?php echo $selEN;?> >English</option>
                        <option value="hi" <?php echo $selHI;?> >Hindi</option>
                    </select>
                </li>
                <script>
                    function getSelectedValue(){
                        let select = document.querySelector("#lang").value;
                        if(select == "en"){
                            document.cookie = "lang_code=en; path=/";
                            window.location.reload();
                        }else if(select == "hi"){
                            document.cookie = "lang_code=hi; path=/";
                            window.location.reload();
                        }
                        
                    }
                </script>
                <?php 
                    if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){?>
                    <li class="sub-list"><a class="links">Category<i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li class="catContent"><a href="category/Food">Food</a></li>
                        <li class="catContent"><a href="category/Music">Music</a></li>
                        <li class="catContent"><a href="category/Sports">Sports</a></li>
                        <li class="catContent"><a href="category/Gymnastics">Gymnastics</a></li>
                        <li class="catContent"><a href="category/Travel">Travel</a></li>
                    </ul>
                </li>
                <li><a class="links" href='homepage'>Home</a></li>    
                <li><a class="links" href='register'>Register</a></li>
                <li><a class="links" href='login'>Login</a></li>
                    
                    <?php }else{ ?>
                        <li class="sub-list"><a class="links">श्रेणी<i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li class="catContent" ><a href="category/Food">भोजन</a></li>
                        <li class="catContent"><a href="category/Music">संगीत</a></li>
                        <li class="catContent"><a href="category/Sports">खेल</a></li>
                        <li class="catContent"><a href="category/Gymnastics">कसरत</a></li>
                        <li class="catContent"><a href="category/Travel">यात्रा</a></li>
                    </ul>
                </li>
                <li><a class="links" href='homepage'>घर</a></li>    
                <li><a class="links" href='register'>रजिस्टर करें</a></li>
                <li><a class="links" href='login'>लॉग इन करें</a></li>
                <?php } ?>
            </ul>
        </header>
    </div>
    <script>
        const button = document.querySelector('.icon');
        const search = document.querySelector('.form-toggle');
        const navBar = document.querySelector('.list');
        const hideBtn = document.querySelector('.hide');
        button.onclick = function() {
            search.classList.remove('inactive');
            search.classList.toggle('active');
            navBar.classList.toggle('inactive');
            navBar.classList.remove('active');
        }
        hideBtn.onclick = function() {
            search.classList.remove('active');
            search.classList.toggle('inactive');
            navBar.classList.toggle('active');
            navBar.classList.remove('inactive');
        }


    </script>
    <script src='script.js'></script>
    <title>Homepage</title>
    <div class='slider-wrapper'>
    <?php
        $sql="SELECT * FROM banners";
        $result=mysqli_query($con,$sql);
        $i=0;
        if(mysqli_num_rows($result) > $i){
            while($images=mysqli_fetch_assoc($result)){
                $input_image="images/".$images['image'];
                $output_image="images/resized1600x832".$images['image'];
                $width=1600;
                $height=832;
                $resource=imagecreatefromjpeg($input_image);
                $scaled=imagescale($resource, $width, $height);
                imagejpeg($scaled,$output_image);
    ?>
    <div class="post-slider" style="background-image: url(<?php echo $output_image;?>)">
        <div class="post-wrapper" style="background-color: rgba(0,0,0,0.25);">
        <div class="post">
                <div class="wrapper">
                    <div class="intro-wrapper">
                        <div class="intro-head">
                            <h3><?php echo $images['banner_title'];?></h3>
                        </div>
                        <div class="intro-text">
                            <p><?php echo $images['banner_snippet'];?></p>
                        </div>
                        <div class="intro-button">
                            <a class="btn">Get Started</a>
                        </div>
                    </div>
                </div>
        </div><!--post end-->
        </div><!-- post wrapper end-->
    </div>
    <?php 
            $i=$i+1;
            }
        }
        ?>
</div><!-- slider wrapper end-->
<div class='content clear'>
<div class='main_content'>
    <?php
        $results_per_page=6;
        if(isset($_POST['pg-num'])){
            $results_per_page=$_POST['pg-num'];
        }
        else{
            $results_per_page=6;
        }
        $sql="SELECT * FROM posts";
        $result=mysqli_query($con,$sql);
        $i=0;
        $num_of_result=mysqli_num_rows($result);    
        $num_of_pages=ceil($num_of_result/$results_per_page);
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
        $start_limit=($page-1)*$results_per_page;
        $sql="SELECT login.username FROM login JOIN posts WHERE (login.id = posts.user_id)";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > $j){
            while($authName=mysqli_fetch_assoc($result)){  
                $author=$authName['username'];
               
            }
            $j=$j+1;
        } 
        if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){
            $lang_code=$_COOKIE["lang_code"];
            $sql="SELECT * FROM posts WHERE lang_code= '$lang_code' LIMIT ".$start_limit.','.$results_per_page;
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > $i){
                while($data=mysqli_fetch_assoc($result)){
                    include("includes/card.php");
                }
            }
        }else{
            $lang_code=$_COOKIE["lang_code"];
            $sql="SELECT * FROM posts WHERE lang_code= '$lang_code' LIMIT ".$start_limit.','.$results_per_page;
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > $i){
                while($data=mysqli_fetch_assoc($result)){
                    include("includes/card.php");
                }
            }
        }
    ?>
    <center>
        <div class='index-homepage'>
            <?php
            for ($page = 1; $page <= $num_of_pages; $page++) {
                echo '<a href="homepage/' . $page . '">' . $page . '</a> ';
            }   ?>
        </div>
    </center>

        </div>
        <?php include('includes/side_content.php') ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.slider-wrapper').slick({
                //autoplay: true,
                //autoplaySpeed: 2000,
            });
            window.addEventListener('scroll', function(){
            let scroll = document.querySelector('.slider-wrapper');
            let scrollText = document.querySelector('.intro-wrapper');
            let navBar = document.querySelector('.homeHeader');
            let links = document.querySelector('.list');
            if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
                scroll.style.opacity = "0.6";
                scroll.style.transition="250ms";
                scrollText.style.opacity = "0.5";
                scrollText.style.transition="250ms";
                navBar.style.background="white";
                links.classList.toggle("scroll");
            } 
            else{
                scroll.style.opacity = "1";
                scroll.style.transition="250ms";
                scrollText.style.opacity = "1";
                scrollText.style.transition="250ms";
                navBar.style.background="transparent";
                links.classList.remove("scroll");
            }
        })
        </script>
        <?php
        require "includes/footer2.php";
        ?>
