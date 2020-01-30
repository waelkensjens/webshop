<?php include_once ('includes/header.php');
include("../Webshop/includes/content-top.php");
$_SESSION['shop_cart']=Session::delete_cart_product($_GET['id']);
echo "<script type='text/javascript'> document.location = 'shop.php'; </script>";


include_once ('includes/footer.php');