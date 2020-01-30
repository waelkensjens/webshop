<?php

include ("includes/header.php");
include("../Webshop/includes/content-top.php");
$categories = Categorie::find_all();
?>



    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Products</h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 ">
                <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                    <div class="nav-responsive">
                        <div class="heading-part">
                            <h2 class="main_title">Top category</h2>
                        </div>
                        <ul class="nav  main-navigation collapse in">
                            <?php foreach ($categories as $category) :?>
                            <li><a href="category_page.php?id=<?php echo $category->category_id?>"><?php echo  $category->category_name;?><span>
                                    <?php
                                    $products = Product::find_the_category_products($category->category_id);
                                    echo "(" . count($products) . ")";
                                    ?>
                               </span> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="filter left-sidebar-widget mb_50">
                    <div class="heading-part mtb_20 ">
                        <h2 class="main_title">Refinr Search</h2>
                    </div>
                    <div class="filter-block">
                        <p>
                            <label for="amount">Price range:</label>
                            <input type="text" id="amount" readonly>
                        </p>
                        <div id="slider-range" class="mtb_20"></div>
                        <div class="list-group">
                            <div class="list-group-item mb_10">
                                <label>Color</label>
                                <div id="filter-group1">
                                    <div class="checkbox">
                                        <label>
                                            <input value="" type="checkbox"> Red (10)</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input value="" type="checkbox"> Green (06)</label>
                                    </div>
                                    <div class="checkbox ">
                                        <label>
                                            <input value="" type="checkbox"> Blue(09)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item mb_10">
                                <label>Size</label>
                                <div id="filter-group3">
                                    <div class="checkbox">
                                        <label>
                                            <input value="" type="checkbox"> Big (3)</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input value="" type="checkbox"> Medium (2)</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input value="" type="checkbox"> Small (1)</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn">Refine Search</button>
                        </div>
                    </div>
                </div>
                <div class="left-special left-sidebar-widget mb_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Top Products</h2>
                    </div>
                    <div id="left-special" class="owl-carousel">
                        <ul class="row ">
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="row ">
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="row ">
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="row ">
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product1-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                            <li class="item product-layout-left mb_20">
                                <div class="product-list col-xs-4">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg"> </a> </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="caption product-detail">
                                        <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                      </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-left">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="page-wrapper pull-right">
                        <label class="control-label" for="input-limit">Show :</label>
                        <div class="limit">
                            <select id="input-limit" class="form-control">
                                <option value="8" selected="selected">08</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                    <div class="sort-wrapper pull-right">
                        <label class="control-label" for="input-sort">Sort By :</label>
                        <div class="sort-inner">
                            <select id="input-sort" class="form-control">
                                <option value="ASC" selected="selected">Default</option>
                                <option value="ASC">Name (A - Z)</option>
                                <option value="DESC">Name (Z - A)</option>
                                <option value="ASC">Price (Low &gt; High)</option>
                                <option value="DESC">Price (High &gt; Low)</option>
                                <option value="DESC">Rating (Highest)</option>
                                <option value="ASC">Rating (Lowest)</option>
                                <option value="ASC">Model (A - Z)</option>
                                <option value="DESC">Model (Z - A)</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="row">

                        <?php $products = Product::find_the_category_products($_GET['id']);?>

                        <?php
                        for ($i=0 ; $i < count($products) ; $i++) {

                            $fields = $products[$i];
                            $product_id = $fields->product_id;
                            $productname = $fields->product_name;
                            $prijs = $fields->prijs;
                            $desc = $fields->description;



                            $image = Product_image::show_front_image_name_by_product_id($product_id);


                            $imagenames = $image->image_name;

                            $imgsrc = $image->upload_directory.DS.$image->image_name;


                            ?>
                            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                                <div class="item">

                                    <div class="product-thumb clearfix mb_30"



                                    <div class="image product-imageblock"> <a href="product_detail_page.php?id=<?php echo $product_id;?>"> <img data-name="product_image" src=" <?php echo $imgsrc; ?>" alt="<?php echo $imagenames; ?>" title="<?php echo $imagenames; ?>"  width="277.5px" height="345.76px" /> <img src="<?php echo $imgsrc; ?>" alt="iPod Classic" title="<?php echo $productname; ?>"  width="277.5px" height="345.76px" /> </a>

                                        <div class="button-group text-center">
                                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>


                                    <div class="caption product-detail text-center">
                                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem"><?php echo $productname; ?></a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">€</span><?php echo $prijs; ?></span>
                    </span>
                                        <p class="product-desc mt_20 mb_60"><?php
                                            echo mb_strimwidth("$desc", 0, 300, "...");

                                            ?></p>



                                    </div>

                                </div>

                            </div>
                        <?php     } ?>

                </div>
                <div class="pagination-nav text-center mt_50">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
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
   <?php include ("includes/footer.php");