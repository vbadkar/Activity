<?php 
    require "includes/header.php";
?>
<title>Translate Post</title>
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
        <form action="includes/translate_validate.php?id=<?php echo $_GET['id']?>" method="post">
        <?php
            $code = $_GET['langCode'];
            $sql = "SELECT lang_name FROM languages WHERE langCode = '$code' ";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $lang = $row['lang_name'];
                }
            }
        ?>
        <h1 class="form-title">Translate Post[<?php echo $lang; ?>]</h1>
            <input class="text-input" type="text" name="title" placeholder="Title" autocomplete='off'>
            <textarea id="editor" class="text-input" name="desc" placeholder="Description" autocomplete='off'></textarea>
            <input type="hidden" name="language"  value="<?php echo $code; ?>">
            <select class="text-input" name="category">
                <option value="select">Select Category</option>
                <?php
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <p><input class="image-input" type="file" accept="image/*" name="image_file"></p>
            <button class="create-button" type="submit" name="submit">Translate</button>
            <a href="user_dashboard.php">Back</a>
        </form>
    </div>
    <script>
        CKEDITOR.replace('desc');
    </script>
<?php 
    require "includes/footer1.php";
?>
