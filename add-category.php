<?php
    require_once "includes/header.php";
?>
<title>Add Category</title>
    <div class="register-form">
        <?php if(isset($_SESSION['message'])):?>
            <div class="msg <?php echo $_SESSION['type'];?>">
                <li><?php echo $_SESSION['message'];?></li>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>
            </div>
        <?php endif;?>
        <form action='includes/add-category-inc.php' method='post'>
            <h1 class="register-title">Add Category</h1>
            <input class="text-input" type='text' name='category' placeholder='Enter a category' autocomplete='off'>
            <button class="register-button" type='submit' name='submit'>Add</button>
        </form>
    </div>
<?php
    require_once "includes/footer1.php";
?>