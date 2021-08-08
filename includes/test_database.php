<?php
require_once 'database.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $sql = "SELECT * FROM login";
    $result = mysqli_query($con, $sql);
    $rowCount = mysqli_num_rows($result);

    if($rowCount>0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['username'].$row['password']."<br>";
        }
    }
    else{
        echo "No results found";
    }

?>
</body>
</html>