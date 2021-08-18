<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
?>
<title>Food</title>
<div class='content clear'>
<div class='main_content'>
    <h1 class="posts">Posts</h1>
    <?php
        $sql="SELECT * FROM posts WHERE category='Music'";
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
<div class='sidebar'>  
    <div class='side-content category'> 
        <h2 class='side-title'>Category</h2>
        <ul>
            <li><a href="food.php">Food</a></li>
            <li><a href="sports.php">Sports</a></li>
            <li><a href="gymnastics.php">Gymnastics</a></li>
            <li><a href="travel.php">Travel</a></li>
        </ul>   
    </div>
</div>
</div>
<?php
    require_once "includes/footer.php";  
?>