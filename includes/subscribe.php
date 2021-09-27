<?php 
  if(isset($_POST['subscribe'])){
    session_start();
    $user_email=$_POST['email'];
    $url="http://blog/unsubscribe.php?email=".$user_email; 
    if(empty($user_email)){
      $_SESSION['message']="Please enter an email address to proceed further";
      $_SESSION['type']="error";
      header("Location: ../contact.php?error=emptyfield");
      exit();
    }elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
      $_SESSION['message']="Invaild Email address";
      $_SESSION['type']="error";
      header("Location: ../contact.php??error=invallidemailidformat");
      exit();
    }else{
      //storing subscriber
      require "database.php";
      
      $sql="SELECT * FROM subscribe WHERE user_email= ?";
      $stmt=mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../contact.php?sqlerror");
          exit();
      }else{
        mysqli_stmt_bind_param($stmt, 's', $user_email);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($result)){
          $_SESSION['message']="You are already a subscriber";
          $_SESSION['type']="error"; 
          header("Location: ../contact.php?success=alreadysubscribed");
          exit();
        }else{
          $sql="INSERT INTO subscribe(user_email) VALUES(?)";
          $stmt=mysqli_stmt_init($con);
          if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../contact.php?sqlerror");
              exit();
          }else{
            mysqli_stmt_bind_param($stmt, 's', $user_email);
            mysqli_stmt_execute($stmt);
            //sending subscription confirmation mail to user
          $message='<p>Great...You just subscribed to us!!</p><br>';
          $message .= '<p>Now you will be informed first hand over a email form us whenever something new comes up<p><br>';
          $message .= 'If you no longer want to receive this email, click on following link to unsubscribe us';
          $message .= '<a href="'.$url.'">'.$url.'</a></p>';

          require '../PHPMailerAutoload.php';
          require 'sendermail.php';
          $mail = new PHPMailer;
        
          $mail->isSMTP();                           
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = $sender;
          $mail->Password = $pass;
          $mail->SMTPSecure = 'tls';              
          $mail->Port = 587;                            

          $mail->setFrom($sender);
          $mail->addAddress($user_email);
          $mail->addReplyTo($sender);
          $mail->isHTML(true);

          $mail->Subject = 'Thanks for subscribing us!!';
          $mail->Body = $message;
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          if(!$mail->send()) {
              $_SESSION['message']="Something went wrong..try again";
              $_SESSION['type']="error"; 
              header("Location: ../reset_password.php?error=failedtosendmail");
              exit();
          } else {
            $_SESSION['message']="Thanks for subscribing!!";
            $_SESSION['type']="success"; 
            header("Location: ../contact.php?success=subscribed");
            exit(); 
          }
          //sending email -end
          }
        }
      }
    }
  }else{
    $_SESSION['message']="Page was loaded without clicking on subscribe button";
    $_SESSION['type']="error"; 
    header("Location: ../contact.php?success=somethingwentwrong");
    exit();
  }
?>