<?php
    if(isset($_POST['submit']))
    {
        require "database.php";
        session_start();
        $language=$_POST['language'];
        $lang_code=$_POST['lang_code'];
        if(empty($language) || empty($lang_code))
        {
            $_SESSION['message']="Fields are blank";
            $_SESSION['type']="error";
            header("Location: ../add-language.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql="SELECT lang_name FROM languages WHERE lang_name = ?";
            $stmt=mysqli_stmt_init($con);   
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../dashboard.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$language);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $count = mysqli_stmt_num_rows($stmt);
                if($count>0)
                {
                    $_SESSION['message']="Language already exists";
                    $_SESSION['type']="error";
                    header("Location: ../dashboard.php?error=languagealreadyexists");
                    exit();
                }
                else
                {
                    $sql="INSERT INTO languages (lang_name, langCode) VALUES (?, ?)";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../dashboard.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"ss",$language, $lang_code);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['message']="Language added sucessfully";
                        $_SESSION['type']="success";
                        header("Location: ../add-language.php?success=languageadded");
                        $msg= "Language added sucessfullly";
                        exit();
                    }
                }
            }
        }
    }
?>