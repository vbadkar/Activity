<?php

include "includes/tanslate_validate.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translate</title>
</head>
<body>
    <a href="includes/translate_validate.php?lang=en">English</a>
    <a href="includes/translate_validate.php?lang=hi">Hindi</a><br>
    <p><?php echo translate('Tring to Translate'); ?></p>
</body>
</html>