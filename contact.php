<?php
    require_once "includes/header.php";
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
    <div class="contact-head">
        <h2>Contact</h2>
        <div class="contact">
            <form action="">
                <input class="contact-input" type="text" placeholder="Name" name="name">
                <input class="contact-input" type="text" placeholder="Email" name="email">
                <textarea class="contact-input-msg" name="message" id="" cols="25" rows="5" placeholder="Message"></textarea>
                <button class="send" type="submit" name="send-button">SEND</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
    require_once "includes/footer.php";
?>