<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "blog_site";

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$con) {
    die("Connection to database failed");
}
