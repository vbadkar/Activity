<?php 
    require "includes/header.php";
?>
<title>Create Post</title>
    <div class="post-form">
    <?php if(isset($_SESSION['message'])):?>
        <div class="msg <?php echo $_SESSION['type'];?>">
            <li><?php echo $_SESSION['message'];?></li>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif;?>
        <form action="includes/createpost_validate.php" method="post">
        <h1 class="form-title">Create Post</h1> 
            <input class="text-input" type="text" name="title" placeholder="Title" autocomplete='off'>
            <textarea id="editor" class="text-input" name="desc" placeholder="Description" autocomplete='off'></textarea>
           <select name="language" class="text-input">
               <option value="en">English</option>
               <option value="hi">Hindi</option>
           </select>
            <select class="text-input" name="category">
                <option value="cat">Select a category</option>
                <option value="Food">Food</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Gymnastics">Gymnastics</option>
                <option value="Travel">Travel</option>
            </select>
            <p><input class="image-input" type="file" accept="image/*" name="image_file"></p>
            <button class="create-button" type="submit" name="submit">Create</button>
            <a href="dashboard.php">Back</a>
        </form>
    </div>
    <script>
        CKEDITOR.replace('desc');
    </script>
<?php 
    require "includes/footer1.php";
?>
