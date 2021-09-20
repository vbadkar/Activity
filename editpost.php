<?php 
    require "includes/database.php";
    require "includes/header.php";
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($con, $sql);
    if($post=mysqli_fetch_assoc($result)){
        $pid=$post['p_id'];
    }
?>
<title>Edit Post</title>
    <div class="edit-form">
    <?php if(isset($_SESSION['message'])):?>
        <div class="msg <?php echo $_SESSION['type'];?>">
            <li><?php echo $_SESSION['message'];?></li>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif;?>  
        <form action="includes/editpost_validate.php?id=<?php echo $_GET['id']?>" method="post">
        <h1 class="form-title">Edit Post</h1> 
            <input class="text-input" type="text" name="title" placeholder="Title" autocomplete='off' value="<?php if(isset($post['title'])){echo $post['title'];}?>">
            <input class="text-input" type="textarea" name="desc" placeholder="Description" autocomplete='off' value="<?php   if(isset($post['description']))
               {
                   echo $post['description'];
               }?>">
            <select class="text-input" name="category">
                <option value="cat">Select a category</option>
                <option value="Food">Food</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Gymnastics">Gymnastics</option>
                <option value="Travel">Travel</option>
            </select>
            <p><input class="image-input" type="file" accept="image/*" name="image_file"></p>
            <button class="edit-button" type="submit" name="submit">Update</button>
            <a href="dashboard.php">Back</a>
        </form>
    </div>
<?php
    require "includes/footer1.php";
?>
