<?php 
    require "includes/database.php";
    require_once "includes/register_validate.php";
    require_once "includes/login_validate.php";
    require_once "includes/header.php";

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    session_start();
?>
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
            $i=0;
            $num_of_result=mysqli_num_rows($result);    
            $num_of_pages=ceil($num_of_result/$results_per_page);
            if(!isset($_GET['page'])){
                $page=1;
            }else{
                $page=$_GET['page'];
            }
            $start_limit=($page-1)*$results_per_page; ?>
            <table>
            <thead>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Code</th>
                <th colspan="3">Action</th>
            </thead>
            <?php
            $langcode = $_COOKIE['lang_code'] ;
            $sql="SELECT * FROM posts WHERE lang_code = '$langcode' AND user_id='$userid' LIMIT ".$start_limit.','.$results_per_page;
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > $i){
                while($row=mysqli_fetch_assoc($result)){
        ?> 
        <div class="main-post-admin">
            <?php
                $input_image="images/".$row['image'];
                $output_image="images/resized408x220".$row['image'];
                $width=408;
                $height=220;
                $resource=imagecreatefromjpeg($input_image);
                $scaled=imagescale($resource, $width, $height);
                imagejpeg($scaled,$output_image);
                $desc=$row['description'];
                $desc = substr($desc,0,100).'...';
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['lang_code']; ?></td>
                        <td>
                            <a href="editpost.php?id=<?php echo $row['p_id'];?>" class="btn edit-link">Edit</a>
                        </td>
                        <td>
                            <a href="deletepost.php?del_id=<?php echo  $row['p_id'];?>" class ="btn delete-link" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                        </td>
                        <td>
                            <a href="language.php?id=<?php echo $row['p_id'];?>" class="btn translate-link">Translate</a>
                        </td>
                    </tr>
                </tbody>
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
        </table>
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