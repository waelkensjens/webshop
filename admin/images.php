<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$users = User::find_all();
$products = Product::find_all();
$images = Product_image::find_all();



include("includes/sidebarcheck.php");

include("includes/content-top.php");

?>

    <div class="content-page">
        <!-- Start content -->
        <div class="content">



            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="widget-inline-box text-center">
                            <h3><i class="text-pink md md-account-child"></i> <?php echo count($users); ?></h3>
                            <h4 class="text-muted">Total users</h4>
                        </div>


                    </div>
                </div>



              <div class="row">
                 <div class="col-sm-12">
                     <ol>
                          <?php foreach ($products as $product):?>
                         <li><a href="product_image.php?name=<?php echo $product->product_name; ?>">
                                 <?php

                                 echo $product->product_name

                                 ?></a> </li>

                         <?php endforeach;?>
                     </ol>
                 </div>
              </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



    </div>








<?php
include("includes/footer.php");
?>