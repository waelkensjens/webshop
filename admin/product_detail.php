<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$product_id = Product::find_by_product_id($_GET['id']);
$products = $product_id;


if(empty($_GET['id'])){
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
                                <div class="sp-wrap">
                                    <a href="<?php echo $products->image_path_and_placeholder(); ?>"><img src="<?php echo $products->image_path_and_placeholder(); ?>" alt="" ></a>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="product-right-info">
                                    <h3><b><?php echo $products->caption ; ?></b></h3>
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star-o" href=""></a></li>
                                        </ul>
                                    </div>

                                    <h2> <b>€<?php echo $products->prijs ; ?></b></h2>

                                    <h5 class="m-t-20"><b>Stock: </b> 256pcs. <span class="label label-default m-l-5">In Stock</span></h5>

                                    <hr/>

                                    <h5 class="font-600">Product Description</h5>

                                    <p class="text-muted"><?php
                                        echo $products->description;

                                        ?></p>




                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row m-t-30">
                            <div class="col-xs-12">
                                <h4><b>Specifications:</b></h4>
                                <div class="table-responsive m-t-20">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Release date</td>
                                            <td>
                                                <?php echo $products->release_date ; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >EAN</td>
                                            <td>
                                                <?php echo $products->EAN ; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>players</td>
                                            <td>
                                                <?php echo $products->dev ; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Categorie(s)</td>
                                            <td>
                                                <?php echo $products->publisher ; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Pegi-age</td>
                                            <td>
                                                13 Centimeters
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pegi-content</td>
                                            <td>
                                                400 Grams
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Publisher</td>
                                            <td>
                                                <?php echo $products->publisher ; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Developer</td>
                                            <td>
                                                <?php echo $products->dev ; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Spoken Languages</td>
                                            <td>
                                                No
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >Written Languages</td>
                                            <td>
                                                TheBrandStore
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div> <!-- end card-box/Product detai box -->
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->



</div>






<?php
include("includes/footer.php");
?>