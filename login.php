<?php
    require_once 'includes/header.php';
?>
  <title>Login Page</title>
  <h1 class="respad">Login Page</h1>
  <div class="formborder">
    <p class="formlinks">Not registered?<a href="register.php">Register</a></p>
        <form action = 'includes/login_validate.php' method='post'>
            <input class="res" type='text' name='username' placeholder='Username' value="<?php 
                if(isset($_COOKIE['cookieuser']))
                {
                    echo $_COOKIE['cookieuser'];
                }
            ?>"><br>
            <input class="res" type='password' name='password'placeholder='Password' value="<?php if(isset($_COOKIE['cookiepass'])){echo $_COOKIE['cookiepass'];}?>"><br>
            <input type ="checkbox" name="rememberme" checked >Remember Me
            <button class="resbutton" type='submit' name='submit'>Login</button>
        </form> 
    </div>
<?php
    require_once 'includes/footer.php';
?>