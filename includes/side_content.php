<?php if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){?>
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
                        $output_image="images/resized75x60".$data['image'];
                        $width=75;
                        $height=60;
                        $resource=imagecreatefromjpeg($input_image);
                        $scaled=imagescale($resource, $width, $height);
                        imagejpeg($scaled,$output_image);
                    ?>
                    <img src="<?php echo $output_image;?>" alt="Popular-post" class="popular-image">
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
                    <iframe width="267.56" height="200" src="https://www.youtube.com/embed/CY4hLz87hu4?cc_load_policy=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="facebook-wrapper">
                <div class="facebook">
                        <h2>Facebook</h2>
                </div>
                <div class="facebook-page">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fway2themes%2Fposts%2F731449897061662&show_text=true&width=500" width="260" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <div class="side-category-wrapper">
                <div class="side-category">
                    <h2>Category</h2>
                </div>
                <?php
                    $food=0;
                    $music=0;
                    $sports=0;
                    $gymnastics=0;
                    $travel=0;
                    $sql="SELECT * FROM posts";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > $i){
                        while($data=mysqli_fetch_assoc($result)){
                            if($data['category'] == 'Food'){
                                $food++;
                            }elseif($data['category'] == 'Music'){
                                $music++;
                            }elseif($data['category'] == 'Sports'){
                                $sports++;
                            }elseif($data['category'] == 'Gymnastics'){
                                $gymnastics++;
                            }elseif($data['category'] == 'Travel'){
                                $travel++;
                            }
                        }
                    }
                ?>
                <ul class="categories">
                        <li>><a href="category/Food">Food<span class="count">(<?php echo $food; ?>) </span></a></li>
                        <li>><a href="category/Music">Music<span class="count">(<?php echo $music; ?>) </span></a></li>
                        <li>><a href="category/Sports">Sports<span class="count">(<?php echo $sports; ?>) </span></a></li>
                        <li>><a href="category/Gymnastics">Gymnastics<span class="count">(<?php echo $gymnastics; ?>) </span></a></li>
                        <li>><a href="category/Travel">Travel<span class="count">(<?php echo $travel; ?>) </span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="side-content">
        <div class="side-posts">
            <div class="social">
                <h2 class="social-title">सामाजिक</h2>
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
                    <h2>लोकप्रिय पोस्ट</h2>
                </div>
                <div class="popular-post">
                <?php 
                    $lang_code=$_COOKIE['lang_code'];
                    $sql="SELECT * FROM posts WHERE lang_code='$lang_code' LIMIT 0,3";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > $i){
                        while($data=mysqli_fetch_assoc($result)){
                ?>
                    <?php 
                        $input_image="images/".$data['image'];
                        $output_image="images/resized75x60".$data['image'];
                        $width=75;
                        $height=60;
                        $resource=imagecreatefromjpeg($input_image);
                        $scaled=imagescale($resource, $width, $height);
                        imagejpeg($scaled,$output_image);
                    ?>
                    <img src="<?php echo $output_image;?>" alt="Popular-post" class="popular-image">
                    <h3 class="popular-post-title"><?php echo $data['title'];?></h3>
                    <?php
                        }
                    }
                ?>
                </div>
            </div>
            <div class="subscribe-wrapper">
                <div class="subscribe">
                    <h2>हमें सब्सक्राइब करें</h2>
                </div>
                <div class="subscribe-video">
                    <div class="video-wrap">
                    <iframe width="267.56" height="200" src="https://www.youtube.com/embed/CY4hLz87hu4?cc_load_policy=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="facebook-wrapper">
                <div class="facebook">
                        <h2>फेसबुक</h2>
                </div>
                <div class="facebook-page">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fway2themes%2Fposts%2F731449897061662&show_text=true&width=500" width="260" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <div class="side-category-wrapper">
                <div class="side-category">
                    <h2>श्रेणी</h2>
                </div>
                <?php
                    $food=0;
                    $music=0;
                    $sports=0;
                    $gymnastics=0;
                    $travel=0;
                    $sql="SELECT * FROM posts";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > $i){
                        while($data=mysqli_fetch_assoc($result)){
                            if($data['category'] == 'Food'){
                                $food++;
                            }elseif($data['category'] == 'Music'){
                                $music++;
                            }elseif($data['category'] == 'Sports'){
                                $sports++;
                            }elseif($data['category'] == 'Gymnastics'){
                                $gymnastics++;
                            }elseif($data['category'] == 'Travel'){
                                $travel++;
                            }
                        }
                    }
                ?>
                <ul class="categories">
                        <li>><a href="category/Food">भोजन<span class="count">(<?php echo $food; ?>) </span></a></li>
                        <li>><a href="category/Music">संगीत<span class="count">(<?php echo $music; ?>) </span></a></li>
                        <li>><a href="category/Sports">खेल<span class="count">(<?php echo $sports; ?>) </span></a></li>
                        <li>><a href="category/Gymnastics">कसरत<span class="count">(<?php echo $gymnastics; ?>) </span></a></li>
                        <li>><a href="category/Travel">यात्रा<span class="count">(<?php echo $travel; ?>) </span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>