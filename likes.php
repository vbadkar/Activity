<?php
    if(isset($_GET['id']) && isset($_GET['user_id']) && isset($_GET['type'])){
        require_once "includes/database.php";
        $id=$_GET['id'];
        $user_id=$_GET['user_id'];
        $sql="SELECT * FROM posts WHERE p_id='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $likecount=$row['likes'];
        if($_GET['type']=='like'){
            $sql="UPDATE posts SET likes=$likecount+1 WHERE p_id='$id' AND user_id='$user_id' ";
            $result=mysqli_query($con, $sql);
            header("Location: single.php?id=$id");
            exit();
        }else{
            $sql="UPDATE posts SET likes=$likecount-1 WHERE p_id='$id' AND user_id='$user_id'";
            $result=mysqli_query($con, $sql);
            header("Location: single.php?user_id=$user_id&id=$id");
            exit();
        }
    }
?>