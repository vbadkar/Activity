<?php
  require "includes/header.php";
?>
  <div class="error404">
  <?php if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){?>
    <h2>Unauthorized Access</h2>
    <h1>403</h1>
    <p>You need to <a href="login">Log-in</a> to view this post</p>
    <p>Don't have an account<a href="register">Register</a>here</p>
    <a href="homepage">Return to Homepage</a>
  <?php }else{ ?>
    <h2>अनाधिकृत उपयोग</h2>
    <h1>403</h1>
    <p>इस पोस्ट को देखने के लिए आपको <a href="login">लॉग-इन </a>करना होगा</p>
    <p>खाता नहीं है?<a href="register">रजिस्टर करें</a></p>
    <a href="homepage">होमपेज पर वापस आएं</a>
  <?php }?>
  </div>
<?php
  require "includes/footer1.php";
?>