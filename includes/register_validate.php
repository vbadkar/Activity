<?php
if(isset($_POST['submit']))
{
    require "database.php";
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $confirm_pass=$_POST['confirmPass'];
    $number = preg_match('@[0-9]@', $pass);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $special_chars = preg_match('@[^\w]@', $pass);
    if(empty($user)||empty($pass)||empty($confirm_pass)){
        header("Location: ../register.php?error=emptyfields&username=".$user);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*/",$user)){
        header("Location: ../register.php?error=invalidusername&username=".$user);
        exit();
    }
    elseif($pass !== $confirm_pass){
        header("Location: ../register.php??error=passwordsdidntmatch&username=".$user);
        exit();
    }
    elseif(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$special_chars)
    {
        header("Location: ../register.php??error=invaildpassword&username=".$user);
        exit();
    }
    else
    {
        $sql="SELECT username FROM login WHERE username = ? ";
        $stmt=mysqli_stmt_init($con);   
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $count = mysqli_stmt_num_rows($stmt);
            if($count>0)
            {
                header("Location: ../register.php?error=usernameexists");
                exit();
            }
            else
            {
                $sql="INSERT INTO login (username, password) VALUES (?, ?)";
                $stmt=mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashedPass=password_hash($pass, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ss",$user, $hashedPass);
                    mysqli_stmt_execute($stmt); 
                    header("Location: ../login.php?success=registered");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>