<?php
   if(isset($_POST['submit']))
   {
        require "database.php";
        $user=$_POST['username'];
        $pass=$_POST['password'];
        if(empty($user) || empty($pass))
        {   
            header("Location: ../login.php?error=emptyfields ");
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
                    $pass_check=password_verify($pass, $row['password']);
                    if($pass_check==0)
                    {
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                    elseif($pass_check==1)
                    {
                        if(!empty($_POST['rememberme'])){
                            setcookie('cookieuser',$user,time()+86400);
                            setcookie('cookiepass',$pass,time()+86400);
                        }
                        else{
                
                            if(isset($_COOKIE['cookieuser'])){
                                setcookie('cookieuser','',time()-3600);
                            }
                            if(isset($_COOKIE['cookiepass'])){
                                setcookie('cookiepass','',time()-3600);
                            }
                        }
                        session_start();
                        $_SESSION['sessionId']=$row['id'];
                        $_SESSION['sessionUser']=$row['username'];
                        header("Location: ../dashboard.php?success=loggedin");
                        exit();
                    }
                    else
                    {
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                }
                else
                {
                    header("Location: ../login.php?error=nouserdatafound");
                    exit();
                }
            }

        }
    }
    else
    {
        //header("Location: ./login.php?error=accessdenied");
        //exit();
    }
?>