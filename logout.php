<?php

require_once("includes/header.php");
include("./includes/content-top.php");
$session->logout();
echo "<script type='text/javascript'> document.location = 'shop.php'; </script>";





?>