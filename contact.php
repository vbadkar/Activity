<?php
    require_once "includes/header.php";
    require "includes/database.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>
    <title>Contact us</title>
</head>
<body>
<div class="contact-wrapper">
<div class="contact">
    <div class="contact-form">
        <div class="contact-head">
            <h2>Contact</h2>
        </div>
        <div class="contact-form-content">
            <form action="" class="">
                <div class="contact-input">
                    <input type="text" placeholder="Name" name="name">
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="contact-button">
                    <textarea class="input-msg" name="message" id="" cols="25" rows="5" placeholder="Message"></textarea>
                    <button class="send" type="submit" name="send-button">SEND</button>
                </div>
            </form>
        </div>
    </div>
    <div class="subscribe-us_wrapper">
        <h2>
            Become A subscriber
        </h2>
        <form action="includes/subscribe" method="post">
            <input class="text-input" type="email" placeholder="Email address" name="email" autocomplete="off" required>
            <input class="sub-btn" type="submit" name="subscribe" value="Subscribe">
        </form>
    </div>
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
            <div class="popular-post-wrapper">
                <div class="popular-posts-title">
                    <h2>Popular posts</h2>
                </div>
                <div class="popular-post">
                <?php 
                    $sql="SELECT * FROM posts LIMIT 0,3";
                    $result=mysqli_query($con,$sql);
                    $i=0;
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

</body>
</html>
<?php
    require_once "includes/footer2.php";
?>