<?php include_once('includes/header.php');?>
<?php include ("../Webshop/includes/content-top.php") ?>
<?php
$countrys = Country::find_all();
$coupon = Coupon::find_all();
$voucher = Coupon::find_all();

//$valid_coupon = Coupon::check_coupon();


if(isset($_POST['update_cart'])){
    $product_id = array();
    $product_qty = array();
    $product_id = $_POST['id'];
    $product_qty = $_POST['qty'];
    $shop_cart = Session::update_cart($product_id,$product_qty);
    $_SESSION['shop_cart'] = $shop_cart;
    //echo "<script type='text/javascript'> document.location = 'cart_page.php'; </script>";
}
$subtotal = 0;
$total=0;
//$_SESSION['weight'] = 0;
$_SESSION['price'] = 0;


$_SESSION['grandtotal'] = 0;
$_SESSION['granddiscount'] = 0;






?>
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Shopping Cart</h1>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div class="col-sm-12 mtb_80 text-center">
            <?php if (empty($_SESSION['shop_cart'])){?>

                <h3>Your shopping cart appears to be empty</h3>
                <br><br>
                <div class="read-more">
                    <h5>Go to the <a href="shop.php">Shop</a> to find products for u</h5>
                </div>
                <br>


            <?php  }?>


        </div>
        <div class="col-sm-12  mtb_20 text-center">

                    <?php
                    $_SESSION['total_price'] = 0;
                    if(!empty($_SESSION['shop_cart'])) { ;?>


          <form enctype="multipart/form-data" method="post" action="#">
            <div class="table-responsive">
              <table class="table table-no-bordered ">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-center">Product Name</td>
                    <td class="text-center">Price</td>
                    <td class="text-center">Quantity</td>
                    <td class="text-center">Total Price</td>
                    <td class="text-center">Remove</td>
                  </tr>
                </thead>
                <tbody>
                        <?php if (array($_SESSION['shop_cart'])) {
                            foreach ($_SESSION['shop_cart'] as $product):
                                $item = Product::find_by_product_id($product[0]);
                                $screen = Product_image::show_all_image_by_product_id($product[0]);
                                $subtotal = $item->prijs * $product[1];
                              //  $_SESSION['weight'] += $item->weight;
                                $_SESSION['total_price'] += $subtotal;
                                ?>
                  <tr>
                    <td class="text-center  "><a href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><img class="img-rounded" width="100" height="100" src="<?php echo $screen[0]->image_path_and_placeholder(); ?>" alt="iPod Classic" title="iPod Classic"></a></td>
                    <td class="text-center"><a href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><?php echo $item->product_name; ?></a></td>
                    <td class="text-center"><span>€</span> <?php echo $item->prijs; ?></td>
                    <td class="text-center">
                      <div style="max-width: 200px;" class="input-group btn-block">
                        <input type="number" class="form-control quantity" min="1" value="<?php echo $product[1]; ?>" name="qty[]" style="background-color: black">
                        <span class="input-group-btn">
                      <button class="btn" title="" name="update_cart" style="border: white 1px solid; data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                      </span></div>
                    </td>
                      <td class="hidden"><input type="text" name="id[]"
                                                value="<?php echo $item->product_id; ?>"></td>
                      <td class=" text-center product-subtotal"><span
                                  class=" amount ">€ <?php echo number_format($subtotal,2); ?></span>
                      </td>
                      <td class="text-center product-remove"><a
                                  href="delete_cart.php?id=<?php echo $item->product_id; ?>"><i class="fa fa-times-circle"></i></a>
                      </td>
                  </tr>

         <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </form>



          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Sub-Total:</strong></td>
                    <td class="text-right"><span>€ </span><?php echo number_format($_SESSION['total_price'],2) ;?></td>
                  </tr>
                  <?php $_SESSION['granddiscount'] = $_SESSION['discount'] + $_SESSION['discount2'];?>
                  <tr>
                    <td class="text-right"><strong>Discount:</strong></td>
                    <td class="text-right"><span>€</span><?php echo $_SESSION['discount'] ;?></td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Discount2:</strong></td>
                    <td class="text-right"><span>€</span><?php echo number_format($_SESSION['discount2'],2) ;?></td>
                  </tr>

                  <tr>
                      <?php $_SESSION['grandtotal'] = $_SESSION['total_price'] - $_SESSION['discount'] - $_SESSION['discount2'] ;?>
                    <td class="text-right"><strong>Total:</strong></td>
                    <td class="text-right"><span>€</span> <?php echo number_format($_SESSION['grandtotal'],2) ;?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
            <h3 class="mtb_10">What would you like to do next?</h3>
            <p>Continue shopping or go to checkout.</p>
          <form action="shop.php">
            <input class="btn pull-left mt_30" style="border: white 1px solid;" type="submit" value="Continue Shopping" />
          </form>
          <form action="checkout_page.php">
            <input class="btn pull-right mt_30" type="submit" value="Checkout" style="border: white 1px solid; " />
          </form>
        </div>
          <?php }};?>
      </div>
      <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Brand Logo</h2>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="brand owl-carousel ptb_20">
                <div class="item text-center"> <a href="#"><img src="images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                <div class="item text-center"> <a href="#"><img src="images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
<?php include_once('includes/footer.php');?>