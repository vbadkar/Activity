<?php
    require "includes/database.php";
    require_once "includes/header.php";
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog_site</title>
</head>
    <div class='single-main-content'>
        <div class="full-content">
            <?php 
                $id=$_GET['id'];
                $userid=$_GET['user_id'];
                $sql="SELECT * FROM posts where p_id='$id'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
            ?>
            <h2 class="posts-title"><?php echo $row['title'];?>
                <ul>
                    <li>
                        <span><a href="likes.php?user_id=<?php echo $userid; ?>&type=like&id=<?php echo $id; ?>" class="like-button">
                        <span id="icon"><i class="far fa-thumbs-up"></i></span>
                        <span id="count"><?php echo $row['likes']; ?></span>
                        </a></span>
                    </li>
                    <li>
                        <span><a href="likes.php?user_id=<?php echo $userid; ?>&type=dislike&id=<?php echo $id; ?>" class="dislike-button">
                        <span id="icon"><i class="far fa-thumbs-down"></i></span>
                        <span id="count"><?php echo $row['likes']; ?></span>
                        </a></span>
                    </li>
</ul>
        </h2>
            <?php 
                $input_image="images/".$row['image'];
                $output_image="images/resized/".$row['image'];
                $width=420;
                $height=260;
                $resource=imagecreatefromjpeg($input_image);
                $scaled=imagescale($resource, $width, $height);
                imagejpeg($scaled,$output_image);
            ?>
            <div class="inner-content">
                    <img src="<?php echo $output_image;?>" alt="" class="post-image">
                <p><?php echo $row['description'];?></p>
            </div>
        </div>
        <div class="side-content">
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
                       while ($row=mysqli_fetch_assoc($result)) {?>
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
            </div>
            </center></div>
        </div>
    </div>
    <script>
                const likebtn = document.querySelector(".like-button");
                let likeicon = document.querySelector("#icon");
                let likecount = document.querySelector("#count");

                let clicked=false;

                likebtn.addEventListener("click", function(){
                    if(!clicked){
                        clicked=true;
                        likeicon.innerHTML='<i class="fas fa-thumbs-up"></i>';
                        likecount.textContent++;
                    }else{
                        clicked=false;
                        likeicon.innerHTML='<i class="far fa-thumbs-up"></i>';
                        likecount.textContent--;
                    }
                });
            </script>
    <footer class="single-footer">
    <ul>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</footer>
</html>
