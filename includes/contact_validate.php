<?php

    if(isset($_POST['send-button'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];


        require "database.php";
        session_start();
        $sql="INSERT INTO contact_info(name, email, message) VALUES(?,?,?)";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../contact.php?sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
            mysqli_stmt_execute($stmt);
            $_SESSION['message']="Thank you for contacting us, we have received your message";
            $_SESSION['type']="success"; 
            header("Location: ../contact.php?success=MessageReceived");
            exit();
        }
    }
    
?>