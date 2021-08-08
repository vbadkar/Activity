<?php
    require_once "includes/header.php";
    require_once "includes/database.php";  
?>
<title>Homepage</title>
    <div class="content clearfix">
        <div class="main_content">
            <h1 class="post_title">Recent Posts</h1>
            <div class="post">
                <img src="images/food.jpg" , alt="" class="post_image">
                <div class="post_preview">
                    <h1><a href="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, praesentium.</a></h1>
                    <i>Vivek Badkar</i>
                    <p class="preview-text">Lorem ipsum dolor sit amet consectetur adipisicing 
                        elit. Libero voluptatum mollitia qui, voluptate n
                        ihil iure aliquid dolorem vel magnam quisquam ea enim 
                        repellat saepe numquam quis! Quisquam iure vitae eius.</p>
                    <a href="samplepost1.php" class="link btn">Read more</a>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="section category">    
            <h2 >Category</h2>
                <ul>
                    <li class="list"><a href="#">Food</a></li>
                    <li class="list"><a href="#">Sports</a></li>
                    <li class="list"><a href="#">Music</a></li>
                    <li class="list"><a href="#">Gymnastics</a></li>
                    <li class="list"><a href="#">Travel</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
    require_once "includes/footer.php";  
?>