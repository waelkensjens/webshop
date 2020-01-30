<?php
include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
include("includes/sidebarcheck.php");
include("includes/content-top.php");


$new_image = new Product_image();
$product = new product();


if (isset($_POST['submit'])) {
    if ($product) {
        $product->product_name = $_POST['product_name'];
        $product->caption = $_POST['caption'];
        $product->description = $_POST['description'];
        $product->prijs = $_POST['prijs'];
        $product->category_id = $_POST['category_id'];
        $product->EAN = $_POST['EAN'];
        $product->release_date = $_POST['release_date'];
        $product->publisher = $_POST['publisher'];
        $product->dev = $_POST['developer'];

        $product->save_product();


        $image_array = ($_FILES['images']);

        var_dump($image_array);

       $cleanArray = $new_image->reArrayFiles($image_array);
        var_dump($cleanArray);
       for ($i=0 ; $i < count($cleanArray) ; $i++) {
            //create new product_image
            $fields = $cleanArray[$i];
            $new_image->product_id = $product->product_id;
            $new_image->image_name = $product->product_name."-"."$i".".jpg";
            var_dump($new_image->image_name);
            $new_image->set_file_product($fields);

            $new_image->save_product_and_image();
       }

       if ($product&&$new_image){
           redirect('products.php');
        }
    }
}



//$products = product::find_all();




?>





<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Add Product</b></h4>


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
                                <label for="EAN">EAN</label>
                                <input type="text" name="EAN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="release_date">release_date</label>
                                <input type="date" name="release_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <input type="text" name="publisher" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="developer">developer</label>
                                <input type="text" name="developer" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="images[]">add images</label>
                                <input type="file" name="images[]" multiple class="form-control">
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