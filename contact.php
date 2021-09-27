<?php
    require_once "includes/header.php";
    require "includes/database.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7ed99e45ec.js" crossorigin="anonymous"></script>
    <title>Contact us</title>
</head>
<body>
<div class="contact-wrapper">
<div class="contact">
    <div class="contact-form">
        <div class="contact-head">
            <h2>Contact</h2>
        </div>
        <div class="contact-form-content">
            <form action="includes/contact_validate" method="post">
                <div class="contact-input">
                    <input type="text" placeholder="Name" name="name">
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="contact-button">
                    <textarea class="input-msg" name="message" id="" cols="25" rows="5" placeholder="Message"></textarea>
                    <button class="send" type="submit" name="send-button">SEND</button>
                </div>
            </form>
        </div>
    </div>
    <div class="subscribe-us_wrapper">
    <?php if(isset($_SESSION['message'])):?>
        <div class="msg <?php echo $_SESSION['type'];?>">
            <li><?php echo $_SESSION['message'];?></li>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif;?>
        <h2>
            Become A subscriber
        </h2>
        <form action="includes/subscribe" method="post">
            <input class="text-input" type="email" placeholder="Email address" name="email" autocomplete="off" required>
            <input class="sub-btn" type="submit" name="subscribe" value="Subscribe">
        </form>
    </div>
</div>
<?php include('includes/side_content.php')?>
</div>

</body>
</html>
<?php
    require_once "includes/footer2.php";
?>