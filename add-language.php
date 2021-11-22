<?php
    require_once "includes/header.php";
?>
<title>Add language</title>
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
        <form action='includes/add-language-inc.php' method='post'>
            <h1 class="register-title">Add language</h1>
            <input class="text-input" type='text' name='language' placeholder='Enter a language' autocomplete='off'>
            <input class="text-input" type='text' name='lang_code' placeholder='Enter a language code(e.g. en for English)' autocomplete='off'>
            <select name="dir" id="sel_user" class="lang" onchange="getSelectedValue();">
                <option value="">Select Language direction</option>
                <option value="ltr">Left To Right</option>
                <option value="rtl">Right To Left</option>
            </select>
            <button class="register-button" type='submit' name='submit'>Add</button>
        </form>
    </div>
<?php
    require_once "includes/footer1.php";
?>