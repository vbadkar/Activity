<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
    require_once "includes/createpost_validate.php";    
?>
<title>Homepage</title>
<div class='slider-wrapper'>
    <div class="post-slider">
        <div class="post-wrapper">
            <div class="post">
                <img src="images/food.jpg" alt="imgfood" class="slider-image" id='sliderImg'>
            </div>
            <button class="prev" onclick="prev()" id="previous"><</button>
            <button class="next" onclick="next()" id="next">></button>
        </div>
    </div>
</div>
<h1 class="posts">Posts</h1>
<div class='content clear'>
<div class='main_content'>
    <?php
        $sql="SELECT * FROM posts";
        $result=mysqli_query($con,$sql);
        $i=0;
        if(mysqli_num_rows($result) > $i){
            while($data=mysqli_fetch_assoc($result)){
    ?>
    <div class="main-post">
        <img class="image" src="images/<?php echo $data['image'];?>", alt="post_image">
        <div class="post-preview">
            <h2><a href="single.php"><?php echo $data['title'];?></a></h2>
            <p class="preview-text"><?php echo $data['description'];?></p>
        </div>
    </div>
    <?php 
        }
    }
    ?>
</div>
</div>
<?php
    require_once "includes/footer.php";  
?>