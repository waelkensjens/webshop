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
                        <th >Category Id</th>

                        <th >edit</th>
                        <th >delete</th>


                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    foreach ($products as $product) :                ?>
                        <tr>


                            <td><a href="product_detail.php?id=<?php echo $product->id; ?>" ><?php echo $product->id; ?></a></td>
                            <td><img height="40" width="40" src=" <?php echo $product->image_path_and_placeholder(); ?>" alt=""></td>

                            <td><?php echo $product->product_name; ?></td>

                            <td><?php echo $product->caption ; ?></td>
                            <td><?php
                                echo mb_strimwidth("$product->description", 0, 24, "...");

                                ?></td>

                            <td>€<?php echo $product->prijs ; ?></td>

                            <td><?php echo $product->category_id ; ?></td>

                            <td><a class="btn btn-danger rounded-0" href="edit_product.php?id=<?php echo $product->id; ?>" ><i class=" ti-pencil-alt"></i></a></td>
                            <td><a class="btn btn-danger rounded-0" href="delete_product.php?id=<?php echo $product->id; ?>" ><i class="ion-trash-a"></i></a></td>


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