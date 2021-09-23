<?php
    if(isset($_POST['submit-new-pass'])){
        $tokenAuth=$_POST['tokenAuth'];
        $tokenValidator=$_POST['tokenValidator'];
        $password=$_POST['password'];
        $confirmPass=$_POST['confirmPass'];

        if(empty($tokenAuth) || empty($tokenValidator) || empty($password) || empty($confirmPass)){
            echo "Empty fields";//include token or start over
        }else if($password != $confirmPass){
            header("Location: ../new_password.php?passwordsdontmatch");
            exit();
        }
        $current_date= date("U");
        require "database.php";
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
                echo "No data found here";
            }else{
                $token = hex2bin($tokenValidator);
                $tokenCheck = password_verify($token, $row['tokenValidator']);
                if($tokenCheck === false){
                    echo "token dosent match";
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
                            echo "not enough data";
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
                                    header("Location: ../login.php?sucess=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
    }else{
        //return them back
    }
?>