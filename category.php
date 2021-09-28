<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
    if(isset($_GET['category']))
    {
        $category=$_GET['category'];
    }
    $sql="SELECT login.username FROM login JOIN posts WHERE (login.id = posts.user_id)";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > $j){
        while($authName=mysqli_fetch_assoc($result)){  
            $author=$authName['username'];
            $j=$j+1;
        }
    }  
?>
<title>Food</title>
<div class='category-content clear'>
    <div class="wrapper">
        <div class="posts"><p>Showing posts with label <span>"<?php echo $category;?>"</span></p></div>
        <div class='main_content'>
        <?php
            $sql="SELECT * FROM posts WHERE category='$category'";
            $result=mysqli_query($con,$sql);
            $i=0;
            if(mysqli_num_rows($result) > $i){
                while($data=mysqli_fetch_assoc($result)){
        ?>
        <?php include('includes/card.php'); ?>
        <?php 
            }
        }
        ?>
    </div>
</div>
<?php include('includes/side_content.php')?>
<?php
    require_once "includes/footer2.php";
?>