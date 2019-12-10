<?php
include ("includes/header.php");

if(!$session->is_signed_in()){
    redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('users.php');
}

$user = User::find_by_id($_GET['id']);
if($user){
    $user->delete();
    redirect('users.php');
}else{
    redirect('users.php');
}

include ("includes/sidebarcheck.php");
include ("includes/content-top.php");


?>

    <h2>welkom op de delete user pagina </h2>

<?php
include ("includes/footer.php")

?>