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
                    while($images=mysqli_fetch_assoc($result)){?>
            <div class="post">
                <img src="images/<?php echo $images['image'];?>" alt="imgfood" class="sliderImg" id="img-slide">
            </div>
            <button class="prev" onclick="prev()" id="previous"><</button>
            <button class="next" onclick="next()" id="next">></button>
            <?php  
                $i=$i+1;                 
                    }
                }
            ?>
           <script>
    var image = document.getElementsByClassName("sliderImg");
    var len=image.length;
    var img=[];
    for(var j=0;j<len;j++){
        img[j] = image[j].getAttribute("src");
    }
    var  i=0;
    no_of_items=img.length;
function prev()
{
    if(i==0){
        i=no_of_items-1;
        document.getElementById("img-slide").src=img[i];
    }
    else{
        i--;
        document.getElementById("img-slide").src=img[i];
    }
}
function next()
{
    if(i<(no_of_items-1)){
        i++;
        document.getElementById("img-slide").src=img[i];
    }
    else
        i=0;
        document.getElementById("img-slide").src=img[i];
}
function slides()
{
    document.getElementById("img-slide").src=img[i];
    if(i<(no_of_items-1))
        i++;
    else
        i=0;
}
</script>
        </div>

    </div>
</div>
<h1 class="posts">Posts</h1>
<div class='content clear'>
<div class='main_content'>
    <?php
        $results_per_page=6;
        if(isset($_POST['pg-num'])){
            $results_per_page=$_POST['pg-num'];
        }
        else{
            $results_per_page=3;
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
             $output_image="images/resized/".$data['image'];
             $width=320;
             $height=250;
             $resource=imagecreatefromjpeg($input_image);
             $scaled=imagescale($resource, $width, $height);
             imagejpeg($scaled,$output_image);
        ?>
        <img class="image" src="<?php echo $output_image;?>", alt="post_image">
        <div class="post-preview">
            <h2><a href="single.php?id=<?php echo $data['p_id'];?>" class="post-title"><?php echo $data['title'];?></a></h2>
            <p class="preview-text"><?php echo $data['description'];?></p>
        </div>
    </div>
    <?php 
        }
    }
    ?>
</div>
<div class='index-homepage'><center>
        <?php
        for($page=1;$page<=$num_of_pages;$page++)
        {
            echo '<a href="homepage.php?page='.$page.'">'.$page.'</a> ';
        }   ?> 
</div>
</center>
</div>
</body>
<footer class="home-footer">
    <ul>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</footer>
</html>