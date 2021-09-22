<?php

if(isset($_POST['reset-button'])){
    $tokenAuth = bin2hex(random_bytes(8)); //generating bytes and converting them to hexadecimal
    $tokenValidator = random_bytes(32);
    $url= "http://localhost/Activity/new_password.php?tokenAuth=".$tokenAuth."&tokenValidator=".bin2hex($tokenValidator);
    $expire= date("U") + 1800;
    $email=$_POST['email'];  
    
    require "database.php";
    session_start();
    //Deleting present token in database to avoid multiple token at same time for a user
    $sql="DELETE from reset_password WHERE reset_email=?";
    $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../reset_password.php?sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
    }
    //Deleting present token in database to avoid multiple token at same time for a user-end
    //inserting reset data in database 
    $sql="INSERT INTO reset_password(reset_email, tokenAuth, tokenValidator, expire_time) VALUES(?,?,?,?)";
    $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../reset_password.php?sqlerror");
        exit();
    }else{
        $hashedToken=password_hash($tokenValidator, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,'ssss',$email, $tokenAuth, $hashedToken, $expire);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    //inserting reset data in database -end

    //sending email
    $message='<p>Go to the following link to reset your password</p>';
    $message .= '<p>Here is the link for rest passowrd:<br>';
    $message .= '<a href="'.$url.'">'.$url.'</a></p>';
    
    require '../PHPMailerAutoload.php';
    require '../sendermail.php';
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 4;      

    $mail->isSMTP();                           
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $sender;
    $mail->Password = $pass;
    $mail->SMTPSecure = 'tls';              
    $mail->Port = 587;                            

    $mail->setFrom($sender);
    $mail->addAddress($email);
    $mail->addReplyTo($sender);
    $mail->isHTML(true);

    $mail->Subject = 'Reset password';
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        $_SESSION['message']="Something went wrong..try again";
        $_SESSION['type']="error"; 
        header("Location: ../reset_password.php?error=failedtosendmail");
        exit();
    } else {
        $_SESSION['message']="Check you mail for reset password link";
        $_SESSION['type']="success"; 
        header("Location: ../reset_password.php?success=");
        exit();
    }
    //sending email -end
}else{
    header("Location: ../login.php?error");
    exit();
}
?>