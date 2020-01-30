<?php include_once("./includes/header.php"); ?>
<?php include ("../Webshop/includes/content-top.php") ?>
<?php if (!empty($_SESSION['user_id'])) {
    $logged_in = User::find_by_id($_SESSION['user_id']);
}

//BUTTONS


// LOGIN
// name submit-login

if (isset($_POST['submit-login'])) {
    $login = new User();
    $login->user_mail = trim($_POST['email']);
    $login->username = trim($_POST['email']);
    $login->password = trim($_POST['password']);

    /*Methode check de db of de user bestaat en log in*/
    if ($login = $login->user_exist()) {
        $login->verify_user($login->username, $login->password);
        $session->login($login);
        redirect('checkout.php');
    } else {
        $the_message = "Your password or username FAILED";
        echo $the_message;
    }
}

if (isset($_POST['coupon_btn'])){

    $coupon_code = $_POST['coupon_code'];

    $couponfound = Coupon::verify_coupon($coupon_code);


    if ($couponfound){


        $_SESSION['discount'] = $couponfound->coupondiscount;
    }else{
        echo 'discount of '.$_SESSION['discount'].'€ has been added';

    }
}else{
    $coupon_code = "";
}

if (isset($_POST['voucher_btn'])){

    $voucher_code = $_POST['voucher_code'];

    $voucherfound = Voucher::verify_voucher($voucher_code);


    if ($voucherfound){


        $_SESSION['discount2'] = $voucherfound->voucherdiscount;
    }else{
        echo 'discount of '.$_SESSION['discount2'].'€ has been added';

    }
}else{
    $voucher_code = "";
}

if (isset($_POST['final_checkout'])) {
    $createuser = new User();
    $createaddress = new Address();
    $createshipping = new Shipping_address();


    /* if user is logged in*/
    if (!empty($logged_in)) {
        /*als same addres is aangevinkt bij ingelogde user*/
        if ($_POST['shipping'] == 'same' ) {

            $createshipping->user_id = $logged_in->id;
            $createshipping->address = trim($_POST['oldaddress']);
            $createshipping->city = trim($_POST['oldcity']);
            $createshipping->postal = trim($_POST['oldpostal']);
            $createshipping->country = trim($_POST['oldcountry']);
            $createshipping->save();
            $_SESSION['shipping'] = $createshipping->shipping_address_id;

            echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";


            /*als different adres is aangevinkt bij ingelogde user*/
        } else{

            $createshipping->user_id = $logged_in->id;
            $createshipping->address = trim($_POST['create_otheraddress']);
            $createshipping->city = trim($_POST['create_othercity']);
            $createshipping->postal = trim($_POST['create_otherpostal']);
            $createshipping->country = trim($_POST['create_othercountry']);
            $createshipping->save();
            $_SESSION['shipping'] = $createshipping->shipping_address_id;
            echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";

        }/*end else shippingaddress*/
        /*if user is !logged in*/
    }else{
        /*create account*/
        if ($_POST['optradio'] == 'create') {

            /*usertabel invullen*/
            $createuser->username = trim($_POST['create_username']);
            $createuser->first_name = trim($_POST['create_first']);
            $createuser->last_name = trim($_POST['create_last']);
            $createuser->password = trim($_POST['create_password']);
            $createuser->user_mail = trim($_POST['create_mail']);
            $createuser->user_image = 'guest';
            $createuser->role_id = '4';
            $createuser->save();
            $_SESSION['user'] = $createuser->id;
            /*adresses tabel invullen*/
            $createaddress->address = trim($_POST['create_address']);
            $createaddress->postal = trim($_POST['create_postal']);
            $createaddress->city = trim($_POST['create_city']);
            $createaddress->country = trim($_POST['create_country']);
            $createaddress->user_id = $createuser->id;/*bekijken hoe user id kan worden aangemaakt*/
            $createaddress->save();
            /*shipping adres same or different in de create account*/
            if ($_POST['shipping'] == 'same') {
                /*als same addres is aangevinkt bij nieuwe user*/
                /*shipping addres invoeren*/
                $createshipping->user_id = $createuser->id;
                $createshipping->address = trim($_POST['create_address']);
                $createshipping->city = trim($_POST['create_city']);
                $createshipping->postal = trim($_POST['create_postal']);
                $createshipping->country = trim($_POST['create_country']);
                $createshipping->save();//in tabel addresses nog kolom country maken en dan inputfield ook readonly stap 1
                $_SESSION['shipping'] = $createshipping->shipping_address_id;
                echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";


            } else{
                /*als different adres is aangevinkt bij nieuwe user*/
                /*shipping addres invoeren*/
                $createshipping->user_id = $createuser->id;
                $createshipping->address = trim($_POST['create_otheraddress']);
                $createshipping->city = trim($_POST['create_othercity']);
                $createshipping->postal = trim($_POST['create_otherpostal']);
                $createshipping->country = trim($_POST['create_othercountry']);
                $createshipping->save();
                $_SESSION['shipping'] = $createshipping->shipping_address_id;
                echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";

            }/*end else different addres*/
        }else{
            /*als guestaccount is aangevinkt*/
            $guestnumber = User::number_guest();
            $newpassword = '';

            /*usertabel invullen*/
            $createuser->username = 'guest' . $guestnumber;
            $createuser->first_name = trim($_POST['create_first']);
            $createuser->last_name = trim($_POST['create_last']);
            $createuser->password = $newpassword;
            $createuser->user_mail = trim($_POST['create_mail']);
            $createuser->user_image = 'guest';
            $createuser->role_id = '4';
            $createuser->save();
            $_SESSION['user'] = $createuser->id;
            /*hier al saven om id te krijgen*/
            /*adresses tabel invullen*/
            $createaddress->address = trim($_POST['create_address']);
            $createaddress->postal = trim($_POST['create_postal']);
            $createaddress->city = trim($_POST['create_city']);
            $createaddress->country = trim($_POST['create_country']);
            $createaddress->user_id = $createuser->id;
            $createaddress->save();


            if ($_POST['shipping'] == 'same') {
                /*als same addres is aangevinkt bij guest*/
                /*shipping addres invoeren*/
                $createshipping->user_id = $createuser->id;
                $createshipping->address = trim($_POST['create_address']);
                $createshipping->city = trim($_POST['create_city']);
                $createshipping->postal = trim($_POST['create_postal']);
                $createshipping->country = trim($_POST['create_country']);
                $createshipping->save();//in tabel addresses nog kolom country maken en dan inputfield ook readonly stap 1
                $_SESSION['shipping'] = $createshipping->shipping_address_id;
                echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";


            } else{
                /*als different adres is aangevinkt bij guest*/
                /*shipping addres invoeren*/
                $createshipping->user_id = $createuser->id;
                $createshipping->address = trim($_POST['create_otheraddress']);
                $createshipping->city = trim($_POST['create_othercity']);
                $createshipping->postal = trim($_POST['create_otherpostal']);
                $createshipping->country = trim($_POST['create_othercountry']);
                $createshipping->save();
                $_SESSION['shipping'] = $createshipping->shipping_address_id;
                echo "<script type='text/javascript'> document.location = 'payment_page.php'; </script>";

            }/*end elseif (guestaccount ->sameaddres)*/
        }/*end else (guestaccount)*/
    } /*end else (!logged in)*/
}/*end isset post*/







if (!empty($logged_in)) {
    $address = Address::find_by_user_id($logged_in->id);

}
?>


    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Checkout</h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div class="row">

                <form action="" method="post" name="final_checkout">

                    <div class="col-lg-12  mtb_20">


                        <div id="exTab1">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#1a" data-toggle="tab">Overview Cart</a>
                                </li>
                                <li><a href="#2a" data-toggle="tab">Personal Details</a>
                                </li>
                                <li><a href="#3a" data-toggle="tab">Delivery Options</a>
                                </li>
                                <li><a href="#4a" data-toggle="tab">Payment Options</a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">

                                <div class="tab-pane active" id="1a">
                                    <div class="row">


                                        <?php
                                        $_SESSION['total_price'] = 0;
                                        if (!empty($_SESSION['shop_cart'])) {
                                        ; ?>


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
                                                    $_SESSION['total_price'] += $subtotal;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center  "><a
                                                                href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><img
                                                                    class="img-rounded" width="100" height="100"
                                                                    src="<?php echo $screen[0]->image_path_and_placeholder(); ?>"
                                                                    alt="iPod Classic" title="iPod Classic"></a></td>
                                                        <td class="text-center"><a
                                                                href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><?php echo $item->product_name; ?></a>
                                                        </td>
                                                        <td class="text-center"><span>€</span> <?php echo $item->prijs; ?>
                                                        </td>
                                                        <td class="text-center"> <?php echo $product[1]; ?>
                                                        </td>

                                                        <td class="hidden"><input type="text" name="id[]"
                                                                                  value="<?php echo $item->product_id; ?>">
                                                        </td>
                                                        <td class=" text-center product-subtotal"><span class=" amount ">€
                                                            <?php echo number_format($subtotal, 2); ?></span>
                                                        </td>
                                                        <td class="text-center product-remove"><a
                                                                href="delete_cart.php?id=<?php echo $item->product_id; ?>"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 col-sm-offset-8">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>Sub-Total:</strong></td>
                                                    <td class="text-right">
                                                        <span>€
                                                        </span><?php echo number_format($_SESSION['total_price'], 2); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
                                                    <td class="text-right">$2.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>VAT (20%):</strong></td>
                                                    <td class="text-right">$42.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>Total:</strong></td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                                <?php }
                                } ?>
                                <div class="tab-pane" id="2a">
                                    <?php if (!empty($logged_in)) { ?>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="form-group space_between">
                                                        <label>First name <span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $logged_in->first_name; ?>" readonly>
                                                    </div>
                                                    <div class="form-group space_between">
                                                        <label>last name <span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $logged_in->last_name; ?>" readonly>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label>Email address <span>*</span></label>
                                                        <input type="email" class="form-control" style="background-color: black"
                                                               value="<?php echo $logged_in->user_mail; ?>" readonly>
                                                    </div>
                                                    <div class="form-group space-between col-8">
                                                        <label>Address <span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $address->address; ?>" name="oldaddress" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City<span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $address->city; ?>" name="oldcity" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postcode <span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $address->postal; ?>" name="oldpostal" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country <span>*</span></label>
                                                        <input type="text" class="form-control" style="background-color: black"
                                                               value="<?php echo $address->country; ?>" name="oldcountry" readonly>
                                                    </div>

                                                </div>

                                            </div>
                                            <br>

                                            <br>
                                            <div class="row hidden ">

                                                <div class="create__account col-lg-6">
                                                    <div class="wn__accountbox radio">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optradio" value="create">Create account
                                                        </label>

                                                    </div>
                                                    <div class="account__field col-lg-12">
                                                        <label>Account username <span>*</span></label>
                                                        <input type="text" placeholder="username" name="create_username">
                                                        <br>
                                                        <br>
                                                        <label>Account password <span>*</span></label>
                                                        <input type="password" placeholder="password" name="create_password">
                                                    </div>
                                                </div>

                                                <div class=" radio col-lg-6">
                                                    <div class="accountbox">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optradio" value="guest"
                                                                   checked>Guestaccount
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row hidden">
                                                <div class="col-lg-12">

                                                    <?php ?>

                                                    <div class="form-group space_between">
                                                        <label>First name <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_first"
                                                               style="background-color: black" value=" " </div> <div
                                                        class="form-group space_between">
                                                        <label>last name <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_last"
                                                               style="background-color: black" value="">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label>Email address <span>*</span></label>
                                                        <input type="email" class="form-control" name="create_mail"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group space-between col-8">
                                                        <label>Street & Number <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_address"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City<span>*</span></label>
                                                        <input type="text" class="form-control" name="create_city"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_postal"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_country"
                                                               style="background-color: black" value="">
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    <?php } else { ?>


                                        <div class="panel-body">

                                            <div class="row">
                                                <h3>Please fill in your details</h3>
                                            </div>
                                            <br>
                                            <div class="row ">

                                                <div class="create__account col-lg-6">
                                                    <div class="wn__accountbox radio">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optradio" value="create">Create account
                                                        </label>

                                                    </div>
                                                    <div class="account__field col-lg-12">
                                                        <label>Account username <span>*</span></label>
                                                        <input type="text" placeholder="username" name="create_username">
                                                        <br>
                                                        <br>
                                                        <label>Account password <span>*</span></label>
                                                        <input type="password" placeholder="password" name="create_password" >
                                                    </div>
                                                </div>

                                                <div class=" radio col-lg-6">
                                                    <div class="accountbox">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optradio" value="guest"
                                                                   checked>Guestaccount
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?php ?>

                                                    <div class="form-group space_between">
                                                        <label>First name <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_first"
                                                               style="background-color: black" value=" " </div> <div
                                                        class="form-group space_between">
                                                        <label>last name <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_last"
                                                               style="background-color: black" value="">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label>Email address <span>*</span></label>
                                                        <input type="email" class="form-control" name="create_mail"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group space-between col-8">
                                                        <label>Street & Number <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_address"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City<span>*</span></label>
                                                        <input type="text" class="form-control" name="create_city"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_postal"
                                                               style="background-color: black" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country <span>*</span></label>
                                                        <input type="text" class="form-control" name="create_country"
                                                               style="background-color: black" value="">
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="3a">
                                <div class="row">
                                    <form>
                                        <label class="radio">
                                            <input type="radio" name="optdelivery" value="normal" checked>
                                            <span>normal delivery 3-20 days (+€5,00)</span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="optdelivery" value="Fast">
                                            <span>Fast delivery 3-7 days (+€15,OO)</span>
                                        </label>

                                    </form>




                                </div>








                                <div class="row">


                                    <div class="accountbox">
                                        <label class="radio-inline">
                                            <input type="radio" name="shipping" value="same" checked>Use same address
                                        </label>
                                    </div>
                                    <div class="customer_details mt--20">
                                        <div class="differt__address">
                                            <label class="radio-inline">
                                                <input id="other_address" name="shipping" type="radio">
                                                <span class="other_address">Ship to a different address ?</span>
                                            </label>
                                        </div>
                                        <div class="customar__field differt__form mt--40">




                                            <div class="form-group space-between col-8">
                                                <label>Street and Number <span>*</span></label>
                                                <input type="text" class="form-control" style="background-color: black"
                                                       value="" name="create_otheraddress">
                                            </div>
                                            <div class="form-group">
                                                <label>City<span>*</span></label>
                                                <input type="text" class="form-control" style="background-color: black"
                                                       value="" name="create_othercity">
                                            </div>
                                            <div class="form-group">
                                                <label>Postal <span>*</span></label>
                                                <input type="text" class="form-control" style="background-color: black"
                                                       value="" name="create_otherpostal">
                                            </div>
                                            <div class="form-group">
                                                <label>Country <span>*</span></label>
                                                <input type="text" class="form-control" style="background-color: black"
                                                       value="" name="create_othercountry">
                                            </div>

                                        </div>

                                    </div>




                                </div>


                            </div>
                            <div class="tab-pane" id="4a">
                                <p>Choose if you have a discount code or reward points you want to use or would like to
                                    estimate your delivery cost.</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel-group mt_20" id="accordion">
                                            <div class="panel panel-default pull-left"
                                                 style="background-color: black; color: white;">
                                                <div class="panel-heading" style="background-color: black; color: white;">
                                                    <h4 class="panel-title" style="color: white" ;><a data-toggle="collapse"
                                                                                                      data-parent="#accordion" href="#collapseOne">Use
                                                            Coupon Code <i class="fa fa-caret-down"></i></a></h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <label for="input-coupon" class="col-sm-4 control-label">Enter your
                                                            coupon here</label>
                                                        <form method="post">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="input-coupon"
                                                                       style="background-color: black"
                                                                       placeholder="Enter your coupon here" name="coupon_code">
                                                                <span class="input-group-btn">
                                                                <input type="submit" name="coupon_btn" class="btn"
                                                                       style="border: white 1px solid;"
                                                                       data-loading-text="Loading..." value="Apply Coupon">
                                                            </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default pull-left"
                                                 style="background-color: black; color: white;">
                                                <div class="panel-heading" style="background-color: black; color: white;">
                                                    <h4 class="panel-title" style="color: white" ;><a data-toggle="collapse"
                                                                                                      data-parent="#accordion" href="#collapseTwo">Use
                                                            Gift Voucher <i class="fa fa-caret-down"></i></a></h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <label for="input-voucher" class="col-sm-4 control-label">Enter your
                                                            gift voucher code here</label>
                                                        <form action="" method="post">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control "
                                                                       style="background-color: black" id="input-voucher"
                                                                       placeholder="Enter your gift voucher code here" value=""
                                                                       name="voucher_code">
                                                                <span class="input-group-btn">
                                                                <input type="submit" name="voucher_btn"
                                                                       class="btn btn-outline-light"
                                                                       style="border: white 1px solid;"
                                                                       data-loading-text="Loading..."
                                                                       value="Apply Voucher">
                                                            </span></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default pull-left"
                                                 style="background-color: black; color: white;">
                                                <div class="panel-heading" style="background-color: black; color: white;">
                                                    <h4 class="panel-title" style="color: white" ;><a data-toggle="collapse"
                                                                                                      data-parent="#accordion" href="#collapseThree">Select
                                                            payment method <i class="fa fa-caret-down"></i></a></h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div id="paypal_button_container"></div>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

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
                                                <?php

                                                $_SESSION['total_price'] = '0';


                                                if (array($_SESSION['shop_cart'])) {
                                                foreach ($_SESSION['shop_cart'] as $product):
                                                    $item = Product::find_by_product_id($product[0]);
                                                    $screen = Product_image::show_all_image_by_product_id($product[0]);
                                                    $subtotal = $item->prijs * $product[1];
                                                    //  $_SESSION['weight'] += $item->weight;
                                                    $_SESSION['total_price'] += $subtotal;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center  "><a
                                                                href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><img
                                                                    class="img-rounded" width="100" height="100"
                                                                    src="<?php echo $screen[0]->image_path_and_placeholder(); ?>"
                                                                    alt="iPod Classic" title="iPod Classic"></a></td>
                                                        <td class="text-center"><a
                                                                href="product_detail_page.php?id=<?php echo $item->product_id; ?>"><?php echo $item->product_name; ?></a>
                                                        </td>
                                                        <td class="text-center"><span>€</span> <?php echo $item->prijs; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div style="max-width: 200px;" class="input-group btn-block">
                                                                <input type="number" class="form-control quantity" min="1"
                                                                       value="<?php echo $product[1]; ?>" name="qty[]"
                                                                       style="background-color: black">
                                                                <span class="input-group-btn">
                                                                <button class="btn" title="" name="update_cart"
                                                                        style="border: white 1px solid; data-toggle="
                                                                        tooltip" type="submit"
                                                                    data-original-title="Update"><i
                                                                        class="fa fa-refresh"></i></button>
                                                            </span></div>
                                                        </td>
                                                        <td class="hidden"><input type="text" name="id[]"
                                                                                  value="<?php echo $item->product_id; ?>">
                                                        </td>
                                                        <td class=" text-center product-subtotal"><span class=" amount ">€
                                                            <?php echo number_format($subtotal, 2); ?></span>
                                                        </td>
                                                        <td class="text-center product-remove"><a
                                                                href="delete_cart.php?id=<?php echo $item->product_id; ?>"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" data-name="final_checkout">
                                            <label for="final_checkout">Proceed to payment</label>
                                            <input type="submit" class="btn" name="final_checkout">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">


                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                                <td class="text-right">
                                                    <span>€
                                                    </span><?php echo number_format($_SESSION['total_price'], 2); ?>
                                                </td>
                                            </tr>
                                            <?php /*$_SESSION['granddiscount'] = $_SESSION['discount'] + $_SESSION['discount2']; */?>
                                            <tr>
                                                <td class="text-right"><strong>Discount:</strong></td>
                                                <td class="text-right">
                                                    <span>€</span><?php /*echo $_SESSION['discount']; */?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Discount2:</strong></td>
                                                <td class="text-right">
                                                    <span>€</span><?php /*echo number_format($_SESSION['discount2'], 2); */?>
                                                </td>
                                            </tr>

                                            <tr>
                                               <!-- --><?php /*$_SESSION['grandtotal'] = $_SESSION['total_price'] - $_SESSION['discount'] - $_SESSION['discount2']; */?>
                                                <td class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right">
                                                    <span>€</span>
                                                    <?php echo number_format($_SESSION['total_price'], 2); ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- =====  CONTAINER END  ===== -->
    <!-- =====  FOOTER START  ===== -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AVY-VmaGwsIATstpB1tewlTqEgKOcte-xwqIr9143pMCmJH4A4APsQfhr9begDzjbHFlmH0U7Oaq32TK"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.

    </script>
    <script
            src="https://www.paypal.com/sdk/js?client-id=CLIENT_ID&commit=false">
    </script>

    <script>

        paypal.Buttons({
            env: 'sandbox',
            client: {
                sandbox: 'AGqP1qb1HvIcanIzJY968ZeYtAF-ACV0NwHndBrp07vSV-djayGSTj61',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'nl_BE',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $_SESSION['total_price']?>,
                            currency: 'EUR'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    //alert('Transaction completed by ' + details.payer.name.given_name + data.orderID);
                    window.location.href = "thankyou.php?idT="+data.orderID;


                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })

                    });

                });
            }
        }).render('#paypal_button_container');
        // This function displays Smart Payment Buttons on your web page.
    </script>


<?php include("./includes/footer.php"); ?>