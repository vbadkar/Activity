<?php 
  if(isset($_POST['subscribe'])){
    $user_email=$_POST['email'];
    if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //Email ID validation
      $subject="Thanks for subscribing!!";
      $message= "You be updated over the mail when new article is posted";
      $sender="From: vivekbadkar@gmail.com";
      echo $user_email;
        echo $subject;
        echo $message;
        echo $sender;
      if(mail($user_email, $subject, $message, $sender)){
        //header("Location: contact.php?success=subscribed");
        //exit();
      }else{
        
        //header("Location: contact.php?success=failedtosendmail");
       //exit();
      }
    }else{
      echo "Invaild email";
    }

  }
?>