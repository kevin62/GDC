<?php

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

  print_r ($_SESSION['captcha']);



?>
