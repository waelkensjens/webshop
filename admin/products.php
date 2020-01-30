<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
$users = User::find_all();
$products = Product::find_all();





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
                    <h3><i class="ti-package"></i> <?php echo count($products); ?></h3>
                    <h4 class="text-muted">Total Products</h4>
                </div>


            </div>
        </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>All Products</b></h4>


                <table id="datatable" class="table table-striped table-bordered">


                    <thead>
                    <tr>

                        <th >#</th>
                        <th >Product_img</th>
                        <th >ProductName</th>
                        <th >Caption</th>
                        <th >Description</th>
                        <th >Prijs</th>
                        <th >Category</th>
                        <th>EAN</th>
                        <th>publisher</th>
                        <th>developer</th>

                        <th >edit</th>
                        <th >delete</th>


                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    foreach ($products as $product) :
                        $product_id = $product->product_id;
                        $images = Product_image::show_front_image_name_by_product_id($product_id);
                    ?>
                        <tr>


                            <td><a href="product_detail.php?name=<?php echo $product->product_name; ?>" ><?php echo $product->product_id; ?></a></td>
                            <td><img height="40" width="40" src="<?php echo $images->image_path_and_placeholder_back(); ?>" alt=""></td>


                            <td><?php echo $product->product_name; ?></td>

                            <td><?php echo $product->caption ; ?></td>
                            <td><?php
                                echo mb_strimwidth("$product->description", 0, 24, "...");

                                ?></td>

                            <td>€<?php echo $product->prijs ; ?></td>

                            <td> <?php $categories = Categorie::find_category_name_by_category_id($product);?>

                                <?php echo $categories[0]->category_name; ?></td>
                            <td><?php echo $product->EAN ; ?></td>
                            <td><?php echo $product->publisher ; ?></td>
                            <td><?php echo $product->dev ; ?></td>

                            <td><a class="btn btn-danger rounded-0" href="edit_product.php?id=<?php echo $product->product_id; ?>" ><i class=" ti-pencil-alt"></i></a></td>
                            <td><a class="btn btn-danger rounded-0" href="delete_product.php?id=<?php echo $product->product_id; ?>" ><i class="ion-trash-a"></i></a></td>


                        </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    </div>








<?php
include("includes/footer.php");
?>