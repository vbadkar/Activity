<?php require "includes/database.php"; ?>
<div class="post-wrapper">
    <?php
        $sql="SELECT * FROM comments";
        $result=mysqli_query($con,$sql);
        $i=0;
        if(mysqli_num_rows($result) > $i){
            while($images=mysqli_fetch_assoc($result)){?>
    <div class="post">
        <img src="images/<?php echo $images['image'];?>" alt="imgfood" id='sliderImg'>
    </div>

    <button class="prev" onclick="prev()" id="previous"><</button>
    <button class="next" onclick="next()" id="next">></button>
    <?php  
        $i=$i+1;                 
            }
        }
    ?>
</div>
<script>
    const image = document.getElementById("sliderImg");
    var img= image.getAttribute("src");
    console.log(img);
</script>