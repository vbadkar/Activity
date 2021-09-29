<?php
    if(isset($_POST['submit']))
    {
        require "database.php";
        session_start();
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $title_hi=$_POST['title-hi'];
        $desc_hi=$_POST['desc-hi'];
        $category=$_POST['category'];
        $image=$_POST['image_file'];
        $userid=$_COOKIE['cookieuserid'];
        if(empty($title) || empty($desc) || empty($title_hi) || empty($desc_hi) || empty($category) || empty($image))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: ../createpost.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT title FROM posts WHERE title = ? AND title_hi";
            $stmt=mysqli_stmt_init($con);   
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../dashboard.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$title, $title_hi);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $count = mysqli_stmt_num_rows($stmt);
                if($count>0)
                {
                    $_SESSION['message']="Same title exists";
                    $_SESSION['type']="error";
                    header("Location: ../dashboard.php?error=titlealreadyexists");
                    exit();
                }
                else
                {
                    $sql="INSERT INTO posts (title, description,title_hi, description_hi, category, image, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../dashboard.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"ssssssi",$title, $desc, $title_hi, $desc_hi, $category, $image, $userid);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['message']="Post created sucessfully";
                        $_SESSION['type']="success";
                        header("Location: ../createpost.php?success=postcreated");
                        $msg= "Post created sucessfullly";
                        exit();
                    }
                }
            }
        }
    }
?>