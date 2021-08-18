<?php
    require_once "includes/header.php";
?>
<title>Registration Page</title>
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
        <form action='includes/register_validate.php' method='post'>
        <h1 class="register-title">Registration Page</h1>
        <p class="redirection">Already registered?<a href="login.php">Login</a></p>
            <input class="text-input" type='text' name='username' placeholder='Username' autocomplete='off'><br>
            <input class="text-input" type='password' name='password'placeholder='Password' id="show-hide"><br>
            <input class="text-input" type='password' name='confirmPass'placeholder='Confirm Password' id="show-hide"><br>
            <button class="register-button" type='submit' name='submit'>Register</button>
        </form>
    </div>
<?php
    require_once "includes/footer.php";
?>