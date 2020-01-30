<?php require_once ("./admin/includes/init.php") ;

//$logged_in = User::find_by_id($session->id);
if(!empty($_SESSION['user_id'])){
    $logged_in = User::find_by_id($_SESSION['user_id']);
}

$shop_cart_count = Session::count_shop_items();

$_SESSION['total_price'] = 0;
?>
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>Gamerz+</title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">
    <!-- =====  CSS  ===== -->
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="./css/owl.carousel.css">


    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!--        <link rel="shortcut icon" href="./images/favicon.png">-->
    <!--        <link rel="apple-touch-icon" href="./images/apple-touch-icon.png">-->
    <!--        <link rel="apple-touch-icon" sizes="72x72" href="./images/apple-touch-icon-72x72.png">-->
    <!--        <link rel="apple-touch-icon" sizes="114x114" href="./images/apple-touch-icon-114x114.png">-->
</head>

<body>

<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
        }
    }
</style>



<!-- =====  HEADER END  ===== -->