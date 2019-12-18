<?php
include ("includes/header.php");

if(!$session->is_signed_in()){
    redirect('login.php');
}
include ("includes/sidebarcheck.php");
if(empty($_GET['id'])){
    redirect('products.php');
}

$product = Product::find_by_product_id($_GET['id']);
if($product){
    $product->delete_product();
    redirect('products.php');
}else{
    redirect('products.php');
}


include ("includes/content-top.php");


?>

    <h2>welkom op de delete user pagina </h2>

<?php
include ("includes/footer.php")

?>