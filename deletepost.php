<?php
require "includes/database.php";
session_start();
$id=$_GET['del_id'];
if(isset($_GET['del_id']))
{
    $sql="DELETE FROM posts WHERE p_id = $id";
    $delquery=mysqli_query($con,$sql); 
    $_SESSION['message']="Post has been deleted";
    $_SESSION['type']="error";
    header("Location: dashboard.php?datadeleted");
    exit();
}
?>