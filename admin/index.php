<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}






$aantalUsers= User::find_all();


include("includes/sidebarcheck.php");
include("includes/content-top.php");
include("includes/content.php");
include("includes/sidebar-right.php");
include("includes/footer.php");
?>

