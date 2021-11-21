<?php
    require_once "includes/header.php";
?>
<title>Create New Password</title>
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
    <?php
        //generation token
        $tokenAuth= $_GET['tokenAuth'];
        $tokenValidator= $_GET['tokenValidator'];
        if(empty($tokenAuth) || empty($tokenValidator)){
            echo "Error";
        }else{
            if(ctype_xdigit($tokenAuth) !==false && ctype_xdigit($tokenValidator) !==false){
            ?>
            <form action='includes/new_pass_validate.php' method='post'>
                <h1 class="register-title">Create New Password</h1>
                <input type="hidden" name="tokenAuth" value="<?php echo $tokenAuth;?>">
                <input type="hidden" name="tokenValidator" value="<?php echo $tokenValidator;?>"> 
                <input class="text-input" type='password' name='password'placeholder='Enter New Password' id="show-hide">
                <input class="text-input" type='password' name='confirmPass'placeholder='Confirm New Password' id="show-hide"><br>
                <button class="register-button" type='submit' name='submit-new-pass'>Reset Password</button>
            </form>
            <?php
            }
        }

    ?>
        
    </div>
<?php
    require_once "includes/footer1.php";
?>
