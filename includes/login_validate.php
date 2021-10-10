<?php
   if(isset($_POST['submit']))
   {
        require "database.php";
        session_start();
        $user=$_POST['username'];
        $pass=$_POST['password'];
        if(empty($user) || empty($pass))
        {   
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT * FROM login WHERE username = ?";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$user);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                if($row=mysqli_fetch_assoc($result))
                {
                    $user_id=$row['id'];
                    setcookie('cookieuserid',$user_id,time()+3600,'/');
                    $pass_check=password_verify($pass, $row['password']);
                    if($pass_check==0)
                    {
                        $_SESSION['message']="Wrong Password";
                        $_SESSION['type']="error";
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                    elseif($pass_check==1)
                    {
                        if(isset($_POST['rememberme'])){
                            setcookie('cookieuser',$user,time()+3600,'/');
                        }
                        else{
                
                            if(isset($_COOKIE['cookieuser'])){
                                setcookie('cookieuser','',time()-3600);
                            }
                        }
                        $_SESSION['sessionId']=$row['id'];
                        $_SESSION['sessionUser']=$row['username'];
                        $_SESSION['message']="Login Sucessful";
                        $_SESSION['type']="success";
                        if($row['user_type']=='admin'){
                            header("Location: ../dashboard.php?success=admin");
                            exit();
                        }else{
                            header("Location: ../user_dashboard.php?success=user");
                            exit();
                        }
                        
                    }
                    else
                    {
                        $_SESSION['message']="Wrong Password";
                        $_SESSION['type']="error";
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                }
                else
                {
                    $_SESSION['message']="User data not found";
                    $_SESSION['type']="error";
                    header("Location: ../login.php?error=nouserdatafound");
                    exit();
                }
            }

        }
    }
?>
