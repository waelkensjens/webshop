<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
if (empty($_GET['id'])) {
    redirect("products.php");
}


$product = product::find_by_id($_GET['id']);
if (isset($_POST['update_product'])) {
    if ($product) {
        $product->product_name = $_POST['product_name'];
        $product->caption = $_POST['caption'];
        $product->description = $_POST['description'];
        $product->prijs = $_POST['prijs'];
        $product->category_id = $_POST['category_id'];

        if(empty($_FILES['product_image'])){
            $product->save();
        }else{
            $product->set_file_product($_FILES['product_image']);

            $product->save_product_and_image();
            $product->save();
            redirect("edit_product.php?id={$product->id}");
        }
    }
}
//$products = product::find_all();


include("includes/sidebarcheck.php");
include("includes/content-top.php");

?>
<div class="content-page">
    <div class="content">
        <div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1>Welkom op de product wijzigen pagina</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 ">
                        <div class="form-group">
                            <label for="product_name">productname</label>
                            <input type="text" name="product_name" class="form-control"
                                   value="<?php echo $product->product_name; ?>"

                        </div>

                        <div class="form-group">
                            <label for="caption">caption</label>
                            <input type="text" name="caption" class="form-control"
                                   value="<?php echo $product->caption; ?>">

                        </div>

                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" name="description"
                                   value="<?php echo $product->description; ?>">
                        </div>

                        <div class="form-group">
                            <label for="prijs">Prijs</label>
                            <input type="text" name="prijs" class="form-control"
                                   value="<?php echo $product->prijs; ?>">
                        </div>
                        <h5 class="m-t-30"><b>category</b></h5>
                        <select class="select2 select2-multiple" name="category_id" multiple="multiple"  multiple data-placeholder="Choose ...">
                            <optgroup label="categories" >
                                <?php $categories = Categorie::find_all();
                                foreach ($categories as $category) :                ?>
                                    <option value="<?= $category->category_id; ?>"><?= $category->category_name; ?></option>

                                <?php endforeach;  ?>
                            </optgroup>

                        </select>
                        <div class="form-group">
                            <label for="product_image">product Image</label>
                            <div>
                            <img src="<?php echo $product->image_path_and_placeholder(); ?>" alt="" class="img-fluid" width="60" height="60">
                            </div>
                            <input type="file" name="product_image" class="form-control">
                        </div>



                        <input type="submit" name="update_product" value="Update product" class="btn btn-primary">
                        <a class="btn btn-danger" href="delete_product.php?id=<?php echo $product->id; ?>">delete product</a>

                    </div>
                </div>


            </form>
        </div>
    </div>
        </div>
    </div>
</div>
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
                            product_id
                            <?php echo $product->id; ?>
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
                                    <a href="<?php echo $product->image_path_and_placeholder(); ?>"><img src="<?php echo $product->image_path_and_placeholder(); ?>" alt="" ></a>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="product-right-info">
                                    <h3 class="editable editable-click"><b><?php echo $product->caption ; ?></b></h3>
                                    <div class="rating">
                                        <ul class="list-inline">
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star-o" href=""></a></li>
                                        </ul>
                                    </div>

                                    <h2> <b>€<?php echo $product->prijs ; ?></b></h2>

                                    <h5 class="m-t-20"><b>Stock: </b> 256pcs. <span class="label label-default m-l-5">In Stock</span></h5>

                                    <hr/>

                                    <h5 class="font-600">Product Description</h5>

                                    <p class="text-muted"><?php
                                        echo $product->description;

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
                                            <td width="400">Brand</td>
                                            <td>
                                                TheBrandStore
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>
                                                Black
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Length</td>
                                            <td>
                                                9 Centimeters
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Width</td>
                                            <td>
                                                20 Centimeters
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td>
                                                13 Centimeters
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td>
                                                400 Grams
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Item part number:</td>
                                            <td>
                                                ABC2016
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Design</td>
                                            <td>
                                                Over-the-head
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Head Support</td>
                                            <td>
                                                No
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="400">Brand</td>
                                            <td>
                                                TheBrandStore
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>
                                                Black
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Length</td>
                                            <td>
                                                9 Centimeters
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
include ("includes/footer.php");

?>}