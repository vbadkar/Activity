<?php
    require_once "includes/header.php";
?>
<title>Registration Page</title>
    <h1 class="respad">Registration Page</h1>
    <div class="formborder">
        <p class="formlinks">Already registered?<a href="login.php">Login</a></p>
        <form action='includes/register_validate.php' method='post'>
            <input class="res" type='text' name='username' placeholder='Username'><br>
            <input class="res" type='password' name='password'placeholder='Password'><br>
            <input class="res" type='password' name='confirmPass'placeholder='Confirm Password'><br>
            <button class="resbutton" type='submit' name='submit'>Register</button>
        </form>
    </div>
<?php
    require_once "includes/footer.php";
?>