<?php
    if(isset($_POST['submit']))
    {
        require "database.php";
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $category=$_POST['category'];
        $image=$_POST['image_file'];
        if(empty($title) || empty($desc) || empty($category) || empty($image))
        {
            header("Location: ../createpost.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT title FROM posts WHERE title = ?";
            $stmt=mysqli_stmt_init($con);   
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../dashboard.php?error=sqlerror");
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
                    header("Location: ../dashboard.php?error=titlealreadyexists");
                    exit();
                }
                else
                {
                    $sql="INSERT INTO posts (title, description, category, image) VALUES (?, ?, ?, ?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../dashboard.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"ssss",$title,$desc,$category,$image);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../dashboard.php?success=postcreated");
                        exit();
                    }
                }
            }
        }
    }
?>