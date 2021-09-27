<?php
    require "includes/header.php";
    require "includes/database.php";
    $unsub_email=$_GET['email'];
    $sql="DELETE FROM subscribe WHERE user_email = '$unsub_email'";
    mysqli_query($con, $sql);
?>

<div class="unsub-wrapper">
    <div class="unsubscribe">
        <h3>You have been successfully unsubscribed!!</h3>
        <p>If this was by mistake,<a href="contact">Subscribe</a> again</p>
    </div>
</div>
<?php
    require "includes/footer1.php";
?>