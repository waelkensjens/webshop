<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

//search prod_name
$product_name = Product::find_by_productname($_GET['name']);
$products = $product_name;

$product_id = $product_name->product_id;

$images = [];
$images = Product_image::show_all_image_by_product_id($product_id);

var_dump($images);

if(empty($_GET['name'])){
    redirect("products.php");

}



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


                    <h4 class="page-title">Product Detail</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Gamerz</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li class="active">

                            <?php echo $products->product_name; ?>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box product-detail-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING
                                    IMAGES
                                </div>

                                <?php
                             foreach ($images as $image):?>
                                <div class="sp-wrap">

                                    <a href="<?php echo $image->image_path_and_placeholder_back(); ?>"><img src="<?php echo $image->image_path_and_placeholder_back(); ?>" alt="" ></a>

                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div><!-- end row -->
                    </div> <!-- end card-box/Product detail box -->
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->



</div>






<?php
include("includes/footer.php");
?>