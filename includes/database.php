<?php
//require_once "../config.php";
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "Vivek@1271";
    $dbName = "blogsite";

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$con) {
    die("Connection to database failed");
}
