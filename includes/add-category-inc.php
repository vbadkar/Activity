<?php
    if(isset($_POST['submit']))
    {
        require "database.php";
        session_start();
        $category=$_POST['category'];
        $lang_code=$_POST['lang_code'];
        $dup_id = 0;
        
        if(empty($category) || empty($lang_code))
        {
            $_SESSION['message']="No category entered";
            $_SESSION['type']="error";
            header("Location: ../add-category.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT cat_name FROM categories WHERE cat_name = ?";
            $stmt=mysqli_stmt_init($con);   
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../dashboard.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$category);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $count = mysqli_stmt_num_rows($stmt);
                if($count>0)
                {
                    $_SESSION['message']="Catgory already exists";
                    $_SESSION['type']="error";
                    header("Location: ../dashboard.php?error=categoryalreadyexists");
                    exit();
                }
                else
                {
                    $sql="INSERT INTO categories (dup_id, cat_name, lang_code) VALUES (?, ?, ?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../dashboard.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"iss", $dup_id, $category, $lang_code);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['message']="Category added sucessfully";
                        $_SESSION['type']="success";
                        header("Location: ../add-category.php?success=categoryadded");
                        $msg= "Category added sucessfully";
                        exit();
                    }
                }
            }
        }
    }
?>