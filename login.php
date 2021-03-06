<?php
    require_once 'includes/header.php';
    session_start();
    $sql="SELECT usertype FROM login";

?>
  <title>Login Page</title>
  <?php if(isset($_SESSION['message'])):?>
        <div class="msg <?php echo $_SESSION['type'];?>">
            <li><?php echo $_SESSION['message'];?></li>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif;?>
  <div class="login-form">
        <form action = 'includes/login_validate.php' method='post'>
        <h2 class="login-title">Login Page</h2>
        <p class="redirection">Not registered?<a href="register.php">Register</a></p>
            <input class="text-input" type='text' name='username' placeholder='Username' value='<?php
                if(isset($_COOKIE['cookieuser']))
                {
                    echo $_COOKIE['cookieuser'];
                }
            ?>' autocomplete='off'>
            <input class="text-input pass" type='password' name='password' placeholder='Password' id='show-hide'>
            <a href="reset_password" class="forgot-pass">Forgot Password?</a>
            <p><input class="remember" type ="checkbox" name="rememberme" onclick="myFunction()">Show password</p>
            <p><input class="remember" type ="checkbox" name="rememberme">Remember Me</p>
            <button class="login-button" type='submit' name='submit'>Login</button>
        </form> 
    </div>
    <script>
    function myFunction() {
        var x = document.getElementById("show-hide");
        if (x.type === "password") {
            x.type = "text";
        }
        else{
            x.type = "password";
        }
    }
</script>
<?php
    require_once 'includes/footer2.php'; 
?> 