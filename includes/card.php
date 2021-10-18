
<div class="main-post">
    <?php 
            $input_image="images/".$data['image'];
            $output_image="images/resized408x220".$data['image'];
            $width=408;
            $height=220;
            $resource=imagecreatefromjpeg($input_image);
            $scaled=imagescale($resource, $width, $height);
            imagejpeg($scaled,$output_image);
            $desc=$data['description'];
            $desc = substr($desc,0,100).'...';             
    ?>
    <div class="card-img">
        <img class="image" src="<?php echo $output_image;?>", alt="post_image"><a href="category/<?php echo $data['category'];?>" class="post-category"><?php echo $data['category']; ?></a>
    </div>
    <div class="post-preview-wrapper">
        <a href="single/<?php echo $data['p_id'];?>" class="post-title"><?php echo $data['title'];?></a>
        <div class="post-preview">
                <span class="author-name"><i class="fas fa-user"></i><?php echo $author; ?></span>
                <span class="post-date"><i class="fas fa-calendar-week">Date</i></span>
                <p class="desc"><?php echo $desc; ?></p>
            </div>
    </div>
</div>
