<?php
    if(isset($_POST['submit-new-pass'])){
        $tokenAuth=$_POST['tokenAuth'];
        $tokenValidator=$_POST['tokenValidator'];
        $password=$_POST['password'];
        $confirmPass=$_POST['confirmPass'];

        if(empty($tokenAuth) || empty($tokenValidator) || empty($password) || empty($confirmPass)){
            $_SESSION['message']="Fields are emptly can't proceed";
            $_SESSION['type']="error"; 
            header("Location: ../new_password.php?error=emptyfields");
            exit();
        }else if($password != $confirmPass){
            $_SESSION['message']="New Passwords doesn't match";
            $_SESSION['type']="error"; 
            header("Location: ../new_password.php?error=passwordsdoesntmatch");
            exit();
        }
        $current_date= date("U");
        require "database.php";
        session_start();
        $sql="SELECT * FROM reset_password WHERE tokenAuth=? AND expire_time >= ?";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../reset_password.php?sqlerror");
            exit();
        }else{

            mysqli_stmt_bind_param($stmt,'ss',$tokenAuth, $current_date);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(!$row=mysqli_fetch_assoc($result)){
                $_SESSION['message']="Token expired, try again";
                $_SESSION['type']="error"; 
                header("Location: ../reset_password.php?error=tokenexpired");
                exit();
            }else{
                $token = hex2bin($tokenValidator);
                $tokenCheck = password_verify($token, $row['tokenValidator']);
                if($tokenCheck === false){
                    $_SESSION['message']="Tokens doesn't match";
                    $_SESSION['type']="error"; 
                    header("Location: ../new_password.php?error=tokensdoesntmatch");
                    exit();
                }else if($tokenCheck === true){
                    $tokenEmail = $row['reset_email'];
                    $sql="SELECT * FROM login WHERE email=?";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../reset_password.php?sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,'s',$tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row=mysqli_fetch_assoc($result)){
                            $_SESSION['message']="No data found";
                            $_SESSION['type']="error"; 
                            header("Location: ../new_password.php?error=nodatafound");
                            exit();
                        }else{
                            $sql ="UPDATE login SET password=? WHERE email=?";
                            $stmt=mysqli_stmt_init($con);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../reset_password.php?sqlerror");
                                exit();
                            }else{
                                $hashedPass=password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt,'ss',$hashedPass,$tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql ="DELETE FROM reset_password WHERE reset_email=?";
                                $stmt=mysqli_stmt_init($con);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    header("Location: ../reset_password.php?sqlerror");
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt,'s',$tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    $_SESSION['message']="Password reset successful, please try again with new password";
                                    $_SESSION['type']="success"; 
                                    header("Location: ../login.php?success=passwordresetsuccessful");
                                    exit();
                                }
                            }
                        }
                    }
                }
            }
        }
    }else{
      
    }
?>