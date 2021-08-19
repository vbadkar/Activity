<?php
require "includes/database.php";
session_start();
$id=$_GET['del_id'];
if(isset($_GET['del_id']))
{
            $sql="DELETE FROM banners WHERE b_id = $id";
            $delquery=mysqli_query($con,$sql); 
            $_SESSION['message']="Banner deleted";
            $_SESSION['type']="error";
            header("Location: banner.php?datadeleted");
            exit();
    }
?>