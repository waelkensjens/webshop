<?php include ('./includes/header.php');
include ('./includes/content-top.php');
$user = User::find_by_id($_SESSION['user']);
$tid = $_GET['idT'];
$shipping = Shipping_address::find_by_user_id($_SESSION['user']);


$createorder = new Order();
$createorder->user_id = $user->id;
$createorder->total = $_SESSION['total_price'];
$createorder->order_date = date(' Y-m-d H-i-s ');
$createorder->shipping_address_id= $shipping->shipping_address_id;
$createorder->transactionID = trim($_GET['idT']);
$createorder->save();

$createdetail = new Order_detail();
foreach ($_SESSION['shop_cart'] as $product):
    $item = Product::find_by_product_id($product[0]);
    $createdetail->product_id = $item->product_id;
    $createdetail->price = $item->prijs;
    $createdetail->quantity = $product[1];
    $createdetail->order_id = $createorder->id;
    $createdetail->create_order_detail();
endforeach;

session_unset();



?>
    <br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Thanks for shopping with us</h1>
            <br><br><br><br>
            <p>your order has been completed please allow us some time to process ur order and confirmation will be mailed to u shortly</p>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 text-center">
            <button class="btn-outline-light btn-lg" style="background: none"><a href="index.php">return to homepage</a> </button>
        </div>
        <br><br><br><br>
    </div>
</div>












<?php include ('./includes/footer.php');



