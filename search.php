<?php
    require_once "includes/header.php";
    require_once "includes/database.php";  
?>
<h1>Search Results</h1>
<div class="main-content-search">
                    <?php
              
                        if(isset($_GET['search'])){
                        $search=mysqli_real_escape_string($con,$_GET['search']);
                        $sql="SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR category LIKE '%$search%'";
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
                    ?>
                        <img class="image" src="<?php echo $output_image;?>", alt="post_image">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $row['p_id'];?>" class="post-title"><?php echo $row['title'];?></a></h2>
                            <p class="preview-text"><?php echo $row['description'];?></p>
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
        <footer class="search-footer">
    <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <p>Designed with <span><i class="fas fa-heart"></i></span> by <span class="brand-name">vbad</span></p>
</footer>
</html>