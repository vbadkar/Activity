<?php 
    $dbHost = "localhost:8889";
    $dbUser = "root";
    $dbPass = "root";
    $dbName = "blog_site";

    $con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if(!$con)
    {
        die("Connection to database failed");
    }
?>