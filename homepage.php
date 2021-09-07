<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
    require_once "includes/createpost_validate.php";
?>
<title>Homepage</title>
<div class='slider-wrapper'>
    <div class="post-slider">
        <div class="post-wrapper">
            <?php
                $sql="SELECT * FROM banners";
                $result=mysqli_query($con,$sql);
                $i=0;
                if(mysqli_num_rows($result) > $i){
                    while($images=mysqli_fetch_assoc($result)){
                    $input_image="images/".$images['image'];
                    $output_image="images/resized".$images['image'];
                    $width=1600;
                    $height=832;
                    $resource=imagecreatefromjpeg($input_image);
                    $scaled=imagescale($resource, $width, $height);
                    imagejpeg($scaled,$output_image);
            ?>
            <div class="post">
                <picture>
                    <source media="(min-width: 900px)" srcset="images/<?php echo $output_image;?>">
                    <source media="(min-width: 768px)" srcset="images/<?php echo $output_image;;?>">
                    <img src="images/<?php echo $output_image;?>" alt="" class="sliderImg" id="img-slide">
                </picture>
                <div class="wrapper">
                    <div class="intro-wrapper">
                        <div class="intro-head">
                            <h3>A Team Of Awesome People</h3>
                        </div>
                        <div class="intro-text">
                            <p>We are a creative web design agency who makes beautiful websites for thousands of peoples.</p>
                        </div>
                        <div class="intro-button">
                            <a href="#">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php  
                $i=$i+1;                 
                    }
                }
            ?>
           
        </div>

    </div>
</div>
<div class='content clear'>
<div class='main_content'>
    <?php
        $results_per_page=4;
        if(isset($_POST['pg-num'])){
            $results_per_page=$_POST['pg-num'];
        }
        else{
            $results_per_page=4;
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
        $sql="SELECT * FROM posts LIMIT ".$start_limit.','.$results_per_page;
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > $i){
            while($data=mysqli_fetch_assoc($result)){
    ?>
    <div class="main-post">
        <?php 
             $input_image="images/".$data['image'];
             $output_image="images/resized".$data['image'];
             $width=408;
             $height=220;
             $resource=imagecreatefromjpeg($input_image);
             $scaled=imagescale($resource, $width, $height);
             imagejpeg($scaled,$output_image);
             $desc=$data['description'];
             $desc = substr($desc,0,100).'...';



        ?>
        <img class="image" src="<?php echo $output_image;?>", alt="post_image"><a href="category.php?category=<?php echo $data['category'];?>" class="post-category"><?php echo $data['category']; ?></a>
        <div class="post-preview-wrapper">
            <a href="single.php?id=<?php echo $data['p_id'];?>" class="post-title"><?php echo $data['title'];?></a>
            <div class="post-preview">
                    <span class="author-name"><i class="fas fa-user">Name</i></span>
                    <span class="post-date"><i class="fas fa-calendar-week">Date</i></span>
                    <p class="desc"><?php echo $desc; ?></p>
                </div>
            
        </div>
    </div>
    <?php 
        }
    }
    
    ?>
    <center>
    <div class='index-homepage'>
            <?php
            for($page=1;$page<=$num_of_pages;$page++)
            {
                echo '<a href="homepage.php?page='.$page.'">'.$page.'</a> ';
            }   ?> 
        </div>
    </center>
    
</div>
<div class="side-content">
        <div class="side-posts">
            <div class="social">
                <h2 class="social-title">Social</h2>
                <ul class="social-icons">
                    <li class="fb"><i class="fab fa-facebook-f"></i></li>
                    <li class="tw"><i class="fab fa-twitter"></i></li>
                    <li class="ln"><i class="fab fa-linkedin-in"></i></li>
                    <li class="rd"><i class="fab fa-reddit"></i></li>
                    <li class="pn"><i class="fab fa-pinterest"></i></li>
                    <li class="vk"><i class="fab fa-vk"></i></li>
                    <li class="ins"><i class="fab fa-instagram"></i></li>
                    <li class="yt"><i class="fab fa-youtube"></i></li>
                    <li class="wt"><i class="fab fa-whatsapp"></i></li>
                    <li class="rss"><i class="fas fa-rss"></i></li>
                </ul>
            </div>
            <div>
                <div class="popular-post-title">
                    <h2>Popular posts</h2>
                </div>
                <div class="popular-post">
                <?php 
                    $sql="SELECT * FROM posts LIMIT 0,3";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > $i){
                        while($data=mysqli_fetch_assoc($result)){
                ?>
                    <?php 
                        $input_image="images/".$data['image'];
                        $output_image="images/resized/".$data['image'];
                        $width=75;
                        $height=60;
                        $resource=imagecreatefromjpeg($input_image);
                        $scaled=imagescale($resource, $width, $height);
                        imagejpeg($scaled,$output_image);
                    ?>
                    <img src="<?php echo $output_image;?>" alt="" class="popular-image">
                    <h3 class="popular-post-title"><?php echo $data['title'];?></h3>
                    <?php
                        }
                    }
                ?>
                </div>
            </div>
            <div class="subscribe-wrapper">
                <div class="subscribe">
                    <h2>Subscribe Us</h2>
                </div>
                <div class="subscribe-video">
                    <iframe src="https://www.youtube.com/watch?v=CY4hLz87hu4" width="284" height="130" frameborder="0"></iframe>
                </div>
            </div>
            <div class="facebook-wrapper">
                <div class="facebook">
                        <h2>Facebook</h2>
                </div>
                <div class="facebook-page">
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fway2themes%2Fposts%2F731449897061662&show_text=true&width=500" width="280" height="120" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <div class="side-category-wrapper">
                <div class="side-category">
                    <h2>Category</h2>
                </div>
                <ul class="categories">
                        <li>><a href="category.php?category=Food">Food<span class="count">(1) </span></a></li>
                        <li>><a href="category.php?category=Music">Music<span class="count">(1) </span></a></li>
                        <li>><a href="category.php?category=Sports">Sports<span class="count">(1) </span></a></li>
                        <li>><a href="category.php?category=Gymnastics">Gymnastics<span class="count">(1) </span></a></li>
                        <li>><a href="category.php?category=Travel">Travel<span class="count">(1) </span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.post-wrapper').slick();
</script>
</body>
<footer class="home-footer">
    <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <p>Designed with <span><i class="fas fa-heart"></i></span> by <span class="brand-name">vbad</span></p>
</footer>
</html>