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
<div class="header-wrapper">
<header>
            <div class='logo'>
                <h3>Vozga</h3>
            </div>
            <div class="search-form">
                        <div class="form-toggle">
                            <form action="search.php" method="get">
                                <input class="search-text" type="text" name="search" placeholder="Search" autocomplete="off" autofocus><span class="hide"><i class="fas fa-times"></i></span>
                            </form>
                        </div>
                        <div class="icon">
                            <span class="show"><i class="fas fa-search" style="color:black; font-size: 14px;font-weight: 600;"></i></span>
                        </div>  
                    </div>
                   
            <img class='hamburger' src='images/hamburger.png' alt='hamburger'></img>
            <ul class='list'>
                <li><a>Category<i class="fas fa-chevron-down" style="color:black; font-size: 14px; font-weight: 600; padding:5px;"></i></a>
                    <ul>
                        <li><a href="category.php?category=Food">Food</a></li>
                        <li><a href="category.php?category=Music">Music</a></li>
                        <li><a href="category.php?category=Sports">Sports</a></li>
                        <li><a href="category.php?category=Gymnastics">Gymnastics</a></li>
                        <li><a href="category.php?category=Travel">Travel</a></li>
                    </ul>
                </li>
                <li><a href='homepage'>Home</a></li>
                <li><a href="includes/logout.php">Logout</a></li>
            </ul>
        </header>
</div>
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
            <?php
                $input_image="images/".$row['image'];
                $output_image="images/resized/".$row['image'];
                $width=408;
                $height=220;
                $resource=imagecreatefromjpeg($input_image);
                $scaled=imagescale($resource, $width, $height);
                imagejpeg($scaled,$output_image);
                $desc=$row['description'];
                $desc = substr($desc,0,100).'...';
            ?>
            <img class="image" src="<?php echo $output_image;?>", alt="post_image">
            <div class="post-preview-wrapper">
                <a href="single?id=<?php echo $row['p_id'];?>" class="post-title"><?php echo $row['title'];?></a>
                <div class="post-preview">
                    <span class="author-name"><i class="fas fa-user"></i>Name</span>
                    <span class="post-date"><i class="fas fa-calendar-week">Date</i></span>
                    <p class="desc"><?php echo $desc; ?></p>
                </div>
            </div>
            <div class="btns">
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
        echo '<a href="user_dashboard.php?page='.$page.'">'.$page.'</a> ';
    }   ?> 
</div>
</center>
    </div>
</body>
</html>