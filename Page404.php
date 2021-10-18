<?php
  require "includes/header.php";
?>
  <div class="error404">
  <?php if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){?>
    <h2>Page Not Found</h2>
    <h1>404</h1>
    <p>Page you are looking does not exist</p>
    <a href="homepage">Return to Homepage</a>
    <?php }else{ ?>
    <h2>पेज नहीं मिला</h2>
    <h1>404</h1>
    <p>आप जो पेज देख रहे हैं वह मौजूद नहीं है</p>
    <a href="homepage">होमपेज पर वापस आएं</a>
    <?php }?>
  </div>
<?php
  require "includes/footer1.php";
?>