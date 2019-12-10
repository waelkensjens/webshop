<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}


$product = new product();
if (isset($_POST['submit'])) {
    if ($product) {
        $product->product_name = $_POST['product_name'];
        $product->caption = $_POST['caption'];
        $product->description = $_POST['description'];
        $product->prijs = $_POST['prijs'];
        $product->category_id = $_POST['category_id'];
        $product->set_file_product($_FILES['product_image']);
        $product->save_product_and_image();
        $product->save();
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
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Add User</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Create New User
                        </p>

                        <form method="POST" data-parsley-validate novalidate enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_name">Product Name*</label>
                                <input type="text" name="product_name" parsley-trigger="change" required placeholder="Enter product name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption*</label>
                                <input type="text" name="caption" parsley-trigger="change" required placeholder="Enter caption" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="description">description*</label>
                                <input type="text" name="description" parsley-trigger="change" required placeholder="description" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="prijs">prijs*</label>
                                <input type="text" name="prijs" parsley-trigger="change" required placeholder="Enter prijs" class="form-control" >
                            </div>


                            <h5 class="m-t-30"><b>Enter category*</b></h5>













                            <select class="select2 select2-multiple" name="category_id" multiple="multiple" multiple data-placeholder="Choose ...">
                                <optgroup label="categories">
                                <?php $categories = Categorie::find_all();
                                        foreach ($categories as $category) :                ?>
                                    <option value="<?= $category->category_id; ?>"><?= $category->category_name; ?></option>

                                    <?php endforeach;  ?>
                                </optgroup>

                            </select>
                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>



                            <div class="form-group text-right m-b-0">
                                <input type="submit" name="submit" value="Add Product" class="btn btn-primary">

                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<?php
include ("includes/footer.php");

?>}