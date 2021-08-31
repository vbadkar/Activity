<?php 
    require "includes/database.php";
    require_once "includes/register_validate.php";
    require_once "includes/login_validate.php";

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="includes/style.css" rel="stylesheet" type="text/css" />
    <title>Dashboard</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <h1>Blog<span>$</span></h1>
            </div>
                <ul>
                    <li><a href="includes/logout.php">Logout</a></li>
                </ul>
    </header>
    <?php if(isset($_SESSION['message'])):?>
            <div class="msg <?php echo $_SESSION['type'];?>">
                <li><?php echo $_SESSION['message'];?></li>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>  
            </div>
        <?php endif;?>
    <div class="manage-posts-admin">
            <div class="admin-manage">
                <ul>
                    <li><a href="createpost.php">Create Posts</a></li>
                </ul>
            </div>
        <div class="main-content-admin">
                    <?php
                        $results_per_page=4;
                        $pid=$row['p_id'];
                        $userid=$_COOKIE['cookieuserid'];
                        $sql="SELECT * FROM posts WHERE user_id='$userid'";
                        $result=mysqli_query($con,$sql);
                        //$rowCount = mysqli_num_rows($result);
                        $i=0;
                        $num_of_result=mysqli_num_rows($result);    
                        $num_of_pages=ceil($num_of_result/$results_per_page);
                        if(!isset($_GET['page'])){
                            $page=1;
                        }else{
                            $page=$_GET['page'];
                        }
                        $start_limit=($page-1)*$results_per_page;
                        $sql="SELECT * FROM posts WHERE user_id='$userid' LIMIT ".$start_limit.','.$results_per_page;
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result) > $i){
                            while($row=mysqli_fetch_assoc($result)){
                    ?> 
                    <div class="main-post-admin">
                    <?
                        $input_image="images/".$row['image'];
                        $output_image="images/resized/".$row['image'];
                        $width=380;
                        $height=220;
                        $resource=imagecreatefromjpeg($input_image);
                        $scaled=imagescale($resource, $width, $height);
                        imagejpeg($scaled,$output_image);
                    ?>
                        <img class="image" src="<?php echo $output_image;?>", alt="post_image">
                    <div class="post-preview">
                            <h2><a href="single.php" class="post-title"><?php echo $row['title'];?></a></h2>
                            <p class="preview-text"><?php echo $row['description'];?></p>
                                <ul class="edit-delete-btn">
                                    <li>
                                        <a href="editpost.php?id=<?php echo $row['p_id'];?>" class="btn edit-link">Edit</a>
                                    </li>
                                    <li>
                                        <a href="deletepost.php?del_id=<?php echo  $row['p_id'];?>" class ="btn delete-link" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <?php
                            $i=$i+1;
                            }
                        }
                        else{
                            ?>
                            <tr>
                                <th colspan="2">No results to display</th>
                            </tr>
                            <?php
                        }
                    ?>
        </div>
        <div class='index-dashboard'><center>
        <?php
        for($page=1;$page<=$num_of_pages;$page++)
        {
            echo '<a href="dashboard.php?page='.$page.'">'.$page.'</a> ';
        }   ?> 
</div>
</center>
    </div>
</body>
</html>