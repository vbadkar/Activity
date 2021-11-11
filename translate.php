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
    <?php
        if($_GET['action'] == 'edit'){
    ?>
        <form action="includes/translate_validate.php?action=edit&&id=<?php echo $_GET['id']?>" method="post">
            <?php
                $code = $_GET['langCode'];
                $id = $_GET['id'];
                $sql = "SELECT lang_name FROM languages WHERE langCode = '$code' ";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $lang = $row['lang_name'];
                    }
                }
            ?>
            <h1 class="form-title">Translate Post[<?php echo $lang; ?>]</h1>
            <?php
                $sql = "SELECT * FROM posts WHERE lang_code = '$code' AND dup_id = '$id' ";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                <input class="text-input" type="text" name="title" placeholder="Title" autocomplete='off' value="<?php echo $row['title'];?>">
                <textarea id="editor" class="text-input" name="desc" placeholder="Description" autocomplete='off'><?php echo $row['description'];?></textarea>
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
                <?php
                    }
                }
                ?>
        </form>
    <?php
        }elseif($_GET['action'] == 'add'){
    ?>
        <form action="includes/translate_validate.php?action=add&&id=<?php echo $_GET['id']?>" method="post">
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
        <?php
            }
        ?>
    </div>
    <script>
        CKEDITOR.replace('desc');
    </script>
<?php 
    require "includes/footer1.php";
?>
