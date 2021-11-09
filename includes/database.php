<?php

    include "dbconfig.php";

    // $dbHost = "localhost";
    // $dbUser = "root";
    // $dbPass = "Vivek@1271";
    // $dbName = "blogsite";

$con = mysqli_connect($database['host'], $database['user'], $database['password'], $database['dbName']);
if (!$con) {
    die("Connection to database failed");
}
