<?php 
    require "database.php";
    session_start();
    $id=$_GET['id'];
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($con, $sql);
    $post=mysqli_fetch_assoc($result);
    if(isset($_POST['submit']))
    {
        require "database.php";
        $id=$_GET['id'];
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $category=$_POST['category'];
        $image=$_POST['image_file'];
        $sql="UPDATE posts SET title='$_POST[title]',description='$_POST[desc]', category='$category', image='$image' WHERE p_id = $id";
        $que=mysqli_query($con,$sql);
        $_SESSION['message']="Post edited sucessfully";
        $_SESSION['type']="success";
        header("Location: ../dashboard.php?success=postedited");
        $msg= "Post edited sucessfullly";
        exit();
    }
?>