<?php
    require "includes/database.php";
    require_once "includes/header.php";
    error_reporting(0);
?>
    <title>Blog_site</title>
</head>
<?php
    if(isset($_COOKIE['lang_en'])){
?>
<div class="wrapper-single">
    <div class='single-main-content'>
        <div class="full-content">
            <?php 
            $id=$_GET['id'];
            $userid=$_GET['user_id'];
            $lang_code = $_COOKIE['lang_code'];
            $sql="SELECT * FROM posts WHERE lang_code='$lang_code' AND p_id='$id'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            ?>
            <ul class="bread-crumb">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="category/<?php echo $row['category'];?>"><?php echo $row['category'];?></a></li>
                <li class="title"><?php echo $row['title'];?></li>
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
                $output_image="images/resized803x535".$row['image'];
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
                            $output_image="images/resized254x120".$data['image'];
                            $width=254;
                            $height=120;
                            $resource=imagecreatefromjpeg($input_image);
                            $scaled=imagescale($resource, $width, $height);
                            imagejpeg($scaled,$output_image);
                        ?>
            
                <a href="single.php/<?php echo $id;?>">
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
        <?php include('includes/side_content.php') ?>
    </div>
</div>
<?php
    }else{?>
        <div class="wrapper-single">
            <div class='single-main-content'>
                <div class="full-content">
                    <?php 
                    $id=$_GET['id'];
                    $userid=$_GET['user_id'];
                    $lang_code = $_COOKIE['lang_code'];
                    $sql="SELECT * FROM posts WHERE lang_code='$lang_code' AND p_id='$id'";
                    $result=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($result);
                    ?>
                    <ul class="bread-crumb">
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="category/<?php echo $row['category'];?>"><?php echo $row['category'];?></a></li>
                        <li class="title"><?php echo $row['title'];?></li>
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
                        $output_image="images/resized803x535".$row['image'];
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
                        <h3>द्वारा प्रकाशित किया गया था <span class="author-name">Author Name</span></h3>
                        <p>बहुत उपेक्ष उपयोगकर्ता डाले। सहयोग करके पासपाई सार्वजनिक भीयह मुश्किल सुचनाचलचित्र सक्षम सुना जिसकी प्रमान पत्रिका माहितीवानीज्य अधिकार अधिकांश निर्माता हैं। </p>
                    </div>
                </div>
                <div class="you-may-like-posts">
                    <div class="may-like-title">
                        <h2>आपको ये पोस्ट पसंद आ सकती हैं</h2>
                    </div>
                    <div class="may-like-content">
                    <?php 
                                $sql="SELECT * FROM posts WHERE lang_code='$lang_code' LIMIT 0,3";
                                $result=mysqli_query($con,$sql);
                                if(mysqli_num_rows($result) > $i){
                                    while($data=mysqli_fetch_assoc($result)){
                            ?>
                                <?php 
                                    $input_image="images/".$data['image'];
                                    $output_image="images/resized254x120".$data['image'];
                                    $width=254;
                                    $height=120;
                                    $resource=imagecreatefromjpeg($input_image);
                                    $scaled=imagescale($resource, $width, $height);
                                    imagejpeg($scaled,$output_image);
                                ?>
                    
                        <a href="single.php/<?php echo $id;?>">
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
            <?php include('includes/side_content.php') ?>
        </div>
</div>
<?php
    }
?>
<?php
require_once "includes/footer2.php";
?>
