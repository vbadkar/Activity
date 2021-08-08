<?php
    require_once 'includes/header.php';
?>
  <title>Login Page</title>
  <h1 class="respad">Login Page</h1>
  <div class="formborder">
    <p class="formlinks">Not registered?<a href="register.php">Register</a></p>
        <form action = 'includes/login_validate.php' method='post'>
            <input class="res" type='text' name='username' placeholder='Username'><br>
            <input class="res" type='password' name='password'placeholder='Password'><br>
            <button class="resbutton" type='submit' name='submit'>Login</button>
        </form> 
    </div>
<?php
    require_once 'includes/footer.php';
?>
