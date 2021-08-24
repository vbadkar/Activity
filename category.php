<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
    if(isset($_GET['category']))
    {
        $category=$_GET['category'];
    }
?>
<title>Food</title>
<div class='category-content clear'>
<div class='main_content'>
    <h1 class="posts"><?php echo $category;?></h1>
    <?php
        $sql="SELECT * FROM posts WHERE category='$category'";
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
<?php
    require_once "includes/footer.php";  
?>