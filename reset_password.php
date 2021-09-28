<?php
    require_once "includes/header.php";
?>
<title>Reset password</title>
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
        <form action='includes/reset_pass_validate.php' method='post'>
        <h1 class="register-title">Reset Password</h1>
        <p>Enter your registered email id to get reset password link</p>
            <input class="text-input" type='text' name='email' placeholder='Enter yourEmail ID' autocomplete='off'>
            <button class="register-button" type='submit' name='reset-button'>Send</button>
        </form>
    </div>
<?php
    require_once "includes/footer1.php";
?>