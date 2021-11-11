<?php
    if(isset($_POST['submit']))
    {
        require "database.php";
        session_start();
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $language=$_POST['language'];
        $category=$_POST['category'];
        $image=$_POST['image_file'];
        $userid=$_COOKIE['cookieuserid'];
        $dupid=$_GET['id'];
        if(empty($title) || empty($desc) || empty($language) || empty($category) || empty($image))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: ../translate.php?error=emptyfields");
            exit();
        }
        else
        {
            if($_GET['action'] == 'add'){
                $sql="SELECT title FROM posts WHERE title = ?";
                $stmt=mysqli_stmt_init($con);   
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../user_dashboard.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"s",$title);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $count = mysqli_stmt_num_rows($stmt);
                    if($count>0)
                    {
                        $_SESSION['message']="Same title exists";
                        $_SESSION['type']="error";
                        header("Location: ../user_dashboard.php?error=titlealreadyexists");
                        exit();
                    }
                    else
                    {
                        $sql="INSERT INTO posts (dup_id, title, description, category, image, user_id, lang_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt=mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt, $sql))
                        {
                            header("Location: ../user_dashboard.php?error=sqlerror");
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"issssis",$dupid, $title, $desc, $category, $image, $userid, $language);
                            mysqli_stmt_execute($stmt);
                            $_SESSION['message']="Post created sucessfully";
                            $_SESSION['type']="success";
                            header("Location: ../user_dashboard.php?success=postcreated");
                            $msg= "Post created sucessfullly";
                            exit();
                        }
                    }
                }
            }elseif($_GET['action'] == 'edit'){
                $sql="UPDATE posts SET title='$title',description='$desc', category='$category', image='$image' WHERE dup_id = '$dupid' AND lang_code = '$language' ";
                $que=mysqli_query($con,$sql);
                $_SESSION['message']="Post edited sucessfully";
                $_SESSION['type']="success";
                header("Location: ../user_dashboard.php?success=postedited");
                $msg= "Post edited sucessfullly";
                exit();
            }
        }
    }
?>