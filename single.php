<?php
    require "includes/database.php";
    require_once "includes/header.php";
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog_site</title>
</head>
<div class="wrapper-single">
<div class='single-main-content'>
    <div class="full-content">
        <?php 
        $id=$_GET['id'];
        $userid=$_GET['user_id'];
        $sql="SELECT * FROM posts where p_id='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        ?>
        <ul class="bread-crumb">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="category.php?id=<?php echo $id;?>"><?php echo $row['category'];?></a></li>
            <li><?php echo $row['title'];?></li>
        </ul>
        <div class="single-post-head">
        <h2 class="posts-title"><?php echo $row['title'];?>
        </h2>
        <div class="post-details">
            <span class="author-name"><i class="fas fa-user">Name</i></span>
            <span class="post-date"><i class="fas fa-calendar-week">Date</i></span>
        </div>
        </div>
        <?php 
        $input_image="images/".$row['image'];
        $output_image="images/resized/".$row['image'];
        $width=803;
        $height=535;
        $resource=imagecreatefromjpeg($input_image);
        $scaled=imagescale($resource, $width, $height);
        imagejpeg($scaled,$output_image);
        ?>
        <div class="inner-content">
            <img src="<?php echo $output_image;?>" alt="" class="post-image">
            <p><?php echo $row['description'];?></p>
            <ul class="social-icons">
                    <li class="fb"><i class="fab fa-facebook-f"></i></li>
                    <li class="tw"><i class="fab fa-twitter"></i></li>
                    <li class="pn"><i class="fab fa-pinterest"></i></li>
                    <li class="ln"><i class="fab fa-linkedin-in"></i></li>
                    <li class="wt"><i class="fab fa-whatsapp"></i></li>
                    <li class="email"><i class="far fa-envelope"></i></li>
            </ul>
        </div>
    </div><!--full content end-->
    <div class="posted-by">
        <div class="poster-pic">
            <img src="images/Sora Blogging Tips.jpg" width="80" height="80" alt="user-pic">
        </div>
        <div class="poster-details">
            <h3>Posted by <span class="author-name">Author Name</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ad animi in, aspernatur quasi debitis.</p>
        </div>
    </div>
    <div class="you-may-like-posts">
        <div class="may-like-title">
            <h2>You may like these posts</h2>
        </div>
        <div class="may-like-content">
        <?php 
                    $sql="SELECT * FROM posts LIMIT 0,3";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > $i){
                        while($data=mysqli_fetch_assoc($result)){
                ?>
                    <?php 
                        $input_image="images/".$data['image'];
                        $output_image="images/resized/".$data['image'];
                        $width=254;
                        $height=120;
                        $resource=imagecreatefromjpeg($input_image);
                        $scaled=imagescale($resource, $width, $height);
                        imagejpeg($scaled,$output_image);
                    ?>
        
            <a href="single.php?id=<?php echo $id;?>">
                <img src="<?php echo $output_image?>" alt="">
                <h3><?php echo $data['title'];?></h3>
            </a>
        
        <?php
            }
        }
        ?>
        </div>
    </div>
    <div class="side-content"><!--single comment section  -->
        <h2>Post a comment <span><i class="fas fa-comments"></i></span></h2>
        <form action="includes/comment_validate.php?id=<?php echo $id; ?>" method="post">
        <input type="text" name="comment-name" class="enter-name" placeholder="Enter name..">
        <textarea name="comment" class="enter-comment" placeholder="Comment..."></textarea>
        <button type="submit" name="post-button" class="post-comment">Post</button>
        </form>
        <div class="comment-section">
            <?php
                $id=$_GET['id'];
                $results_per_page=3;
                if(!isset($_GET['page'])){
                $page=1;
                }else{
                $page=$_GET['page'];
                }
                $start_limit=($page-1)*$results_per_page;
                $sql="SELECT * FROM comments WHERE p_id='$id' LIMIT ".$start_limit.','.$results_per_page;
                $result=mysqli_query($con,$sql);
                $num_of_result=mysqli_num_rows($result);
                $num_of_pages=ceil($num_of_result/$results_per_page);
                $i=0;
                if(mysqli_num_rows($result)>$i){
                while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <span class="comment-name"><i class="fas fa-user"><?php echo $row['name'];?></i></span>
            <p class="comment"><?php echo $row['comment'];?></p>
                <?php
                $i=$i+1;
                    }
                }
                ?>
            <div class='index-comments'><center>
                <?php
                for($page=1;$page<=$num_of_pages;$page++)
                {
                echo '<a href="single.php?id='.$id.'&page='.$page.'">'.$page.'</a> ';
                }   
                ?> 
            </div></center>
        </div>
    </div><!--single comment section end -->
    </div><!-- single main content end-->
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
            <div class="popular-post-wrapper">
                <div class="popular-posts-title">
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
                    <div class="video-wrap">
                    <iframe width="284" height="130" src="https://www.youtube.com/embed/CY4hLz87hu4" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="facebook-wrapper">
                <div class="facebook">
                        <h2>Facebook</h2>
                </div>
                <div class="facebook-page">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fway2themes%2Fposts%2F731449897061662&show_text=true&width=500" width="285" height="150" style="border:none;overflow:hidden;padding:10px" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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
</div>
<?php
require_once "includes/footer.php";
?>
