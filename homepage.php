<?php
    require_once "includes/header.php";
    require_once "includes/database.php";
    require_once "includes/createpost_validate.php";  

    $sql="SELECT * FROM posts";
    $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: homepage.php?error=sqlerror ");
        exit();
    }
    else{
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $data=mysqli_fetch_assoc($result);
    }
?>
<title>Homepage</title>
    <div class="content clearfix">
        <div class="main_content">
            <h1 class="post_title">Recent Posts</h1>
            <div class="post">
                <img src="images/<?php echo $data['image'];?>", alt="" class="post_image">
                <div class="post_preview">
                    <h1><a href=""><?php echo $data['title'];?></a></h1>
                    <p class="preview-text"><?php echo $data['description'];?></p>
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