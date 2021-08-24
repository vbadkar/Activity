<?php 
    require "includes/database.php";
    session_start();
    if(isset($_POST['submit'])){
        $image=$_POST['image_file'];
        $sql="INSERT INTO banners (image) VALUES ('$image')";
        $stmt=mysqli_stmt_init($con);
        if(empty($image))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: dashboard.php?error=emptyfields");
            exit();
        }
        else{
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: dashboard.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$image);
                mysqli_stmt_store_result($stmt);
                $count = mysqli_stmt_num_rows($stmt);
                if($count>0)
                {
                    $_SESSION['message']="Image already exists";
                    $_SESSION['type']="error";
                    header("Location: banner.php?error=imagealreadyexists");
                    exit();
                }
                mysqli_stmt_bind_param($stmt,"s",$image);
                mysqli_stmt_execute($stmt);
                $_SESSION['message']="Banner added";
                $_SESSION['type']="success";
                header("Location: dashboard.php?success=banneradded");
                $msg= "Banner added";
                exit();
            }
        }
    }
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
                    <li><a href="dashboard.php">Back</a></li>
                    <li><a href="includes/logout.php">Logout</a></li>
                </ul>
    </header>
    <div class="manage-posts">
        <div class="left-sidebar">
            <div class="admin-manage">
                <ul>
                    <li><a href="createpost.php">Manage Posts</a></li>
                    <li><a href="manageuser.php">Manage Users</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
        <h1>Manage Banners</h1>
        <?php if(isset($_SESSION['message'])):?>
            <div class="msg <?php echo $_SESSION['type'];?>">
                <li><?php echo $_SESSION['message'];?></li>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>  
            </div>
        <?php endif;?>
            <form action="banner.php" method="post">
                <p><input class="image-input" type="file" accept="image/*" name="image_file"></p>
                <button class="banner-button" type="submit" name="submit">Add Banner</button>
            </form>
            <table class="content-table">
                <thead>
                    <th>Banner ID.</th>
                    <th>Image</th>
                    <th colspan='2'>Action</th>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM banners";
                        $result=mysqli_query($con,$sql);
                        //$rowCount = mysqli_num_rows($result);
                        $i=0;
                        if(mysqli_num_rows($result) > $i){
                            while($row=mysqli_fetch_assoc($result)){
                    ?> 
                    <tr>
                        <td><?php echo $row['b_id'];?></td>
                        <td><?php echo $row['image'];?></td>
                        <td><a href="deletebanner.php?del_id=<?php echo  $row['b_id'];?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
                    </tr>
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
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>