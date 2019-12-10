<?php
$role= Role::find_by_role_id($_SESSION['role_id']);
if ($role->rolename=='admin'){
    include ("./includes/sidebar-left.php");
}elseif ($role->rolename=='owner'){
    include ("./includes/sidebar-left2.php");
}elseif ($role->rolename=='employee'){
    include ("./includes/sidebar-left3.php");
}else{
    redirect("./page-404.php");
}
