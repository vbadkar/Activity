<?php
    if(isset($_POST['post-button']))
    {
        require "database.php";
        $name=$_POST['comment-name'];
        $comment=$_POST['comment'];
        $id=$_GET['id'];
        if(empty($name) || empty($comment))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: ../single.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT * FROM comments WHERE name = ?";
            $stmt=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../single.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql="INSERT INTO comments (name, comment, p_id) VALUES (?, ?, ?)";
                $stmt=mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../single.php?error=sqlerror");
                    exit();
                }
                mysqli_stmt_bind_param($stmt,"ssi",$name, $comment, $id);
                mysqli_stmt_execute($stmt);
                
            
                header("Location: ../single.php?id=".$id."commentadded");
                exit();

            }            
            }
           
        }
?>