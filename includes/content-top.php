

<!-- end header.php -->
<!-- =====  LODER  ===== -->
<!-- <div class="loder"></div>
<div class="wrapper">
  <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
    <div class="newsletter-popup"> <img class="offer" src="images/newsbg.jpg" alt="offer">
      <div class="newsletter-popup-static newsletter-popup-top">
        <div class="popup-text">
          <div class="popup-title">50% <span>off</span></div>
          <div class="popup-desc">
            <div>Sign up and get 50% off your next Order</div>
          </div>
        </div>
        <form onsubmit="return  validatpopupemail();" method="post">
          <div class="form-group required">
            <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
            <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
            <label class="checkme">
              <input type="checkbox" value="" id="checkme" /> Dont show again</label>
          </div>
        </form>
      </div>
    </div>
  </div> -->
<!-- =====  HEADER START  ===== -->
<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="header-top-left">
                        <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Get all yout games at a cheaper price</span></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="header-top-right text-right">
                        <?php if (!empty($logged_in)){ ; ?>
                            <li class="account dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"><?php echo $logged_in->username ; ?><span class="caret"></span> </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="user-account.php">My Account</a></li>
                                    <li><a href="wishlist.php">My Wishlist</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        }else{ ?>
                            <li class="account dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Login<span class="caret"></span> </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="login.php">Existing Customer</a></li>
                                    <li><a href="register_customer.php">New customer</a></li>
                                </ul>
                            </li>
                        <?php }; ?>
                        <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Language <span class="caret"></span> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">English</a></li>
                                <li><a href="#">dutch</a></li>
                                <li><a href="#">French</a></li>
                            </ul>
                        </li>
                        <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Currency <span class="caret"></span> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                                <li><a href="#">€ Euro</a></li>
                                <li><a href="#">£ Pound Sterling</a></li>
                                <li><a href="#">$ US Dollar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="main-search mt_40">
                        <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                        <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> </div>
                </div>
                <!-- logo -->
                <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="index.php"> <img alt="themini" src="images/gamerzblack.png" class="img-responsive"> </a> </div>
                <!-- end logo -->


                <!--shoppingcartbutton-->
                <div class="col-xs-6 col-sm-4 shopcart">
                    <div id="cart" class="btn-group btn-block mtb_40">
                        <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">Shopping cart</span><span id="cart-total">items <?php echo $shop_cart_count ;?></span> </button>
                    </div>
                    <div id="cart-dropdown" class="cart-menu collapse ">
                        <ul>
                            <li>

                                <?php if (!empty($_SESSION['shop_cart'])){ ?>
                                <table class="table table-no-bordered">
                                    <tbody>
                                    <?php if (array($_SESSION['shop_cart'])) {
                                    foreach ($_SESSION['shop_cart'] as $product):
                                        $item = Product::find_by_product_id($product[0]);
                                        $screen = Product_image::show_all_image_by_product_id($product[0]);
                                        $subtotal = $item->prijs * $product[1];
                                        //  $_SESSION['weight'] += $item->weight;
                                        $total = $_SESSION['total_price'] += $subtotal;
                                        ?>
                                        <tr>
                                            <!-- items in de cart -->
                                            <td class="text-center"><a href="#"><img width="100" height="100" src="<?php echo $screen[0]->image_path_and_placeholder(); ?>" alt="iPod Classic" title="iPod Classic"></a></td>
                                            <td class="text-left product-name"><a href="#"><?php echo $item->product_name; ?></a> <span class="text-left price"><span>€</span> <?php echo $item->prijs; ?></span>
                                                <input class="cart-qty" name="qty" min="1" value="<?php echo $product[1]; ?>" type="number" readonly style="background-color: black">
                                            </td>
                                            <td class="text-center"><a href="remove_cart.php?id=<?php echo $item->product_id; ?>" class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </li>

                            <li>
                                <!-- stop items -->
                                <!-- cart pricing -->
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="text-right"><strong>Sub-Total</strong></td>
                                        <td class="text-right"></td>
                                    </tr>


                                    <tr>
                                        <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                                        <td class="text-right">$2.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>VAT (20%)</strong></td>
                                        <td class="text-right">$20.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Total</strong></td>
                                        <td class="text-right"><span>€ </span><?php echo number_format($total,2) ;?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- stop pricing -->
                            </li>

                            <li>
                                <!-- cart buttons -->
                                <form action="cart_page.php">
                                    <input class="btn pull-left mt_10" value="View cart" type="submit">
                                </form>
                                <form action="checkout_page.php">
                                    <input class="btn pull-right mt_10" value="Checkout" type="submit">
                                </form>
                                <!-- end cart buttons -->
                            </li>
                            <?php }}else{?>
                                <li>
                                    <h4>It appears ur cart is Empty</h4>
                                    <h6>add some items to view your cart</h6>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- start navbar -->
            <nav class="navbar">
                <p>menu</p>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul id="menu" class="nav navbar-nav">
                        <li> <a href="./index.php">Home</a></li>

                        <li> <a href="./shop.php">Shop</a></li>
                        <li> <a href="./blog.php">Blog</a></li>

                        <li> <a href="./about.php">About us</a></li>
                        <li> <a href="./contact.php">Contact us</a></li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
        </div>
    </div>
    <!-- end navbar -->
</header>
