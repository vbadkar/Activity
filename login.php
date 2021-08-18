<?php
    require_once 'includes/header.php';
?>
  <title>Login Page</title>
  
  <div class="login-form">
  <?php if(isset($_SESSION['message'])):?>
        <div class="msg <?php echo $_SESSION['type'];?>">
            <li><?php echo $_SESSION['message'];?></li>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif;?>
        <form action = 'includes/login_validate.php' method='post'>
        <h2 class="login-title">Login Page</h2>
        <p class="redirection">Not registered?<a href="register.php">Register</a></p>
            <input class="text-input" type='text' name='username' placeholder='Username' value='<?php
                if(isset($_COOKIE['cookieuser']))
                {
                    echo $_COOKIE['cookieuser'];
                }
            ?>' autocomplete='off'><br>
            <input class="text-input" type='password' name='password' placeholder='Password' id='show-hide'?>"><br>
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
    require_once 'includes/footer.php'; 
?> 