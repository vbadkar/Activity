<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $input_image="images/food.jpg";
        $output_image="food.jpg";
        $width=380;
        $height=220;
        $info=getimagesize($input_image);
        $resource=imagecreatefromjpeg($input_image);
        $scaled=imagescale($resource, $width, $height);
        imagejpeg($scaled,$output_image);
        imagedestroy($resource);
        imagedestroy($scaled);
    ?>
    <img src="food.jpg" alt="">
    <?php
    $info2=getimagesize($output_image);
    echo $info2[3];
    ?>
</body>
</html>