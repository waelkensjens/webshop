<?php include("./includes/header.php"); ?>
<?php include ("../Webshop/includes/content-top.php") ?>
<?php

if(empty($_GET['id'])){
    redirect("index.php");
}
$products = Product::find_by_product_id($_GET['id']);

$screens = array();
$screens = Product_image::show_all_image_by_product_id($_GET['id']);
$related = Product::find_by_category_id($products);




//add items to cart

if(isset($_POST['submit_product'])){
    $add_to_cart = true;
    $add_product = array();
    $add_product[0] = $_GET['id'];
    $add_product[1] = $_POST['quantity'];
    // Als er nog geen items in de shop_cart zit, voeg item toe. Als de shop_cart leeg is, bestaat deze niet en wordt er een foutmelding weergegeven
    if(empty($_SESSION['shop_cart'])){
        $_SESSION['shop_cart'] = array();
        array_push($_SESSION['shop_cart'], $add_product);
        echo "<script type='text/javascript'> document.location = 'shop.php'; </script>";
    }
    else{
        // Als het id al in de shopcart zit, wordt enkel het aantal overschreden
//         foreach ($_SESSION['shop_cart'] as $product){
//             if ($product[0] == $_GET['id']){
//                 $product[1] = $add_product[1];
//                 $add_to_cart = false;
//             }
//         }
        for ($i=0;$i<count($_SESSION['shop_cart']);$i++){
            if ($_SESSION['shop_cart'][$i][0] == $_GET['id']){
                $_SESSION['shop_cart'][$i][1] = $add_product[1];
                $add_to_cart = false;
                break;
            }
        }
//         Toevoegen van een nieuw product
        if($add_to_cart) {
            array_push($_SESSION['shop_cart'], $add_product);
        }
        echo "<script type='text/javascript'> document.location = 'shop.php'; </script>";
    }

}

?>




<!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1><?php echo mb_strtoupper($products->product_name); ?></h1>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="category_page.php">Products</a></li>
              <li class="active"><?php echo $products->product_name; ?></li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->

        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="row mt_10 ">
            <div class="col-md-6">

                <!--              big image-->

              <div> <img data-name="product_image"  href="<?php echo $screens[0]->image_path_and_placeholder(); ?>" src="<?php echo $screens[0]->image_path_and_placeholder(); ?>" alt="" /></div>
              <div id="product-thumbnail" class="owl-carousel">

                  <!--             small image-->
                    <?php foreach ($screens as $screen):

                    ?>
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="<?php  echo $screen->image_path_and_placeholder(); ?>" data-fancybox="group1"> <img src="<?php echo $screen->image_path_and_placeholder(); ?>" alt="" /></a></div>
                </div>
                  <?php endforeach; ?>
               

              </div>

            </div>
            <div class="col-md-6 prodetail caption product-thumb">
              <h4 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem"><?php echo $products->product_name; ?></a></h4>
              <div class="rating">
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
              </div>
              <span class="price mb_20"><span class="amount"><span class="currencySymbol">€</span><?php echo $products->prijs; ?></span>
              </span>
              <hr>
              <ul class="list-unstyled product_info mtb_20">
                  <li>
                      <label>Release Date:</label>
                      <span> <?php echo $products->release_date; ?></span></li>
                  <br>
                  <hr>

                <li>
                  <label>Publisher:</label>
                  <span> <a href="#"><?php echo $products->publisher; ?></a></span></li>
                <li>
                  <label>EAN:</label>
                  <span> <?php echo $products->EAN; ?></span></li>
                <li>
                  <label>Developer:</label>
                  <span> <?php echo $products->dev ; ?></span></li>
              </ul>
              <hr>
              <p class="product-desc mtb_30"><?php
                  echo mb_strimwidth("$products->description", 0, 30, "...");

                  ?></p>
              <div id="product">
                  <form action="" method="post"   >
                <div class="qty mt_30 form-group2">
                  <label>Qty</label>
                  <input name="quantity" id="qty" min="1" value="1" type="number">
                </div>
              <!--   <div class="addtocart__actions">
                      <button class="" type="submit" name="submit_product" title="Add to Cart">Add to Cart</button>
                  </div>-->


                <div class="button-group mt_30">
                    <input style="color: transparent" class="btn add-to-cart"  name="submit_product" id="submit_product" title="Add to cart" type="submit" ></input>
                    <input style="color: transparent"  class="btn wishlist"  name="submit_wish" id="submit_wish" title="Add to wishlist" type="submit" ></input>
                    <input style="color: transparent"  class="btn compare"  name="submit_compare" id="submit_compare" title="Add to compare" type="submit" ></input>
                </div>
                  </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="exTab5" class="mtb_30">
                <ul class="nav nav-tabs">
                  <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                  <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
                  <li><a href="#3c" data-toggle="tab">Solution</a> </li>
                </ul>
                <div class="tab-content ">
                  <div class="tab-pane active pt_20" id="1c">
                    <p><?php echo $products->description ?></p>
                  </div>
                  <div class="tab-pane" id="2c">
                    <form class="form-horizontal">
                      <div id="review"></div>
                      <h4 class="mt_20 mb_30">Write a review</h4>
                      <div class="form-group required">
                        <div class="col-sm-12">
                          <label class="control-label" for="input-name">Your Name</label>
                          <input name="name" value="" id="input-name" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group required">
                        <div class="col-sm-12">
                          <label class="control-label" for="input-review">Your Review</label>
                          <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                          <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                        </div>
                      </div>
                      <div class="form-group required">
                        <div class="col-md-6">
                          <label class="control-label">Rating</label>
                          <div class="rates"><span>Bad</span>
                            <input name="rating" value="1" type="radio">
                            <input name="rating" value="2" type="radio">
                            <input name="rating" value="3" type="radio">
                            <input name="rating" value="4" type="radio">
                            <input name="rating" value="5" type="radio">
                            <span>Good</span></div>
                        </div>
                        <div class="col-md-6">
                          <div class="buttons pull-right">
                            <button type="submit" class="btn btn-md btn-link">Continue</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane pt_20" id="3c">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel tellus.applied clearfix to the tab-content to rid of the gap between the tab and the content</p>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Related Products</h2>
              </div>
                <?php if (!empty($related)) {?>
              <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    <?php foreach ($related as $relate):
                        $pid = $relate->product_id;

                        $relimg = Product_image::show_all_image_by_product_id($pid);


                        ?>
                  <div class="item">
                    <div class="product-thumb">
                      <div class="image product-imageblock"> <a href="product_detail_page.php?id=<?php echo $pid;?>"> <img data-name="product_image" src="<?php echo $relimg[0]->image_path_and_placeholder();?>" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="<?php echo $relimg[0]->image_path_and_placeholder();?>" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                          <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                          <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                          <div class="compare"><a href="#"><span>Compare</span></a></div>
                          <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                      </div>
                      <div class="caption product-detail text-center">
                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem"><?php echo $relate->product_name; ?></a></h6>
                        <div class="rating">
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                        </div>
                        <span class="price"><span class="amount"><span class="currencySymbol">€</span><?php echo $relate->prijs; ?></span>
                        </span>
                      </div>
                    </div>
                  </div>
                    <?php endforeach; ?>
                </div>
              </div>
                <?php }else{
                    echo 'No related products';
                } ?>
            </div>

          </div>
        </div>
      </div>
      <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
          <div class="heading-part mb_10 ">
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
<?php include("./includes/footer.php"); ?>