<?php
    require_once "includes/header.php";
    require_once "includes/database.php";  
?>
<h1>Search Results</h1>
<div class="main-content-search">
<?php

    if(isset($_GET['search'])){
    $search=mysqli_real_escape_string($con,$_GET['search']);
    $sql="SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR SOUNDEX(category) = SOUNDEX('%$search%')";
    $result=mysqli_query($con,$sql);
    $rowCount=mysqli_num_rows($result);
    if($rowCount>0){
        while($row=mysqli_fetch_assoc($result)){

?> 
<div class="main-post-search">
<?php
    $input_image="images/".$row['image'];
    $output_image="images/resized/".$row['image'];
    $width=380;
    $height=220;
    $resource=imagecreatefromjpeg($input_image);
    $scaled=imagescale($resource, $width, $height);
    imagejpeg($scaled,$output_image);
    $desc=$row['description'];
    $desc = substr($desc,0,100).'...';
?>
    <img class="image" src="<?php echo $output_image;?>", alt="post_image">
    <div class="post-preview">
        <h2><a href="single.php?id=<?php echo $row['p_id'];?>" class="post-title"><?php echo $row['title'];?></a></h2>
        <p class="preview-text"><?php echo $desc;?></p>
    </div>
</div>
<?php        
        }
    }
}
else{
    echo "No results to display";
    }   
?>
</div>
<?php
require "includes/footer2.php";
?>