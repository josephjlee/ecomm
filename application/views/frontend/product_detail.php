<style>
    .shop-main-area .price-box .price {
        color: #ff7878;
        font-size: 30px;
        font-weight: 700;
        line-height: 50px;
    }

    .shop-main-area .price-box .price-strike {
        color: #aaa;
        font-size: 16px;
        font-weight: 300;
        line-height: 50px;
        text-decoration: line-through;
    }
</style>
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>product details</h2>
                    <ul>
                        <li><a href="<?= base_url() ?>">Home /</a></li>
                        <li class="active"><a href="">product details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area">
    <div class="container">
        <div class="row">
            <?php foreach ($product_details as $product_detail) { $id = $product_detail['product_id'];?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- zoom-area-start -->
                    <div class="zoom-area mb-3">
                        <img id="zoompro" src="<?= base_url() ?><?=$product_detail['image_name']?>"
                             data-zoom-image="<?= base_url() ?><?=$product_detail['image_name']?>" alt="zoom"/>
                        <div id="gallery" class="mt-30">
                            <?php $images = $this->db->query("select * from product_image where product_id = $id")->result_array();?>
                            <?php foreach ($images as $image) { ?>
                            <a href="#" data-image="<?= base_url() ?><?=$image['image_name'];?>"
                               data-zoom-image="<?= base_url() ?><?=$image['image_name'];?>">
                                <img src="<?= base_url() ?><?=$image['image_name'];?>" alt="zoom"/>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- zoom-area-end -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- zoom-product-details-start -->
                    <div class="zoom-product-details">
                        <h1><?= $product_detail['product_name'] ?></h1>
                        <div class="main-area mtb-30">
                            <div class="rating">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="review-2">
                                <a href="#">1 reviews</a>
                                <a href="#">Write a review</a>
                            </div>
                        </div>
                        <?php if ($product_detail['discount'] > 0) { ?>
                            <div class="price-box">
                             <span class="price"> Rs.<?= $product_detail['sale_price']; ?>
                                 <unit>/</unit>
                                          </span>
                                <span class="price-strike">Rs.<?= $product_detail['purchase_price']; ?></span>
                                    <span class="label label-success">
						Discount: <?= $product_detail['discount']; ?> %
                                    </span>
                            </div>
                        <?php } else { ?>
                            <div class="price">
                                <div class="price-box">
                             <span class="price"> Rs.<?= $product_detail['purchase_price']; ?>
                                 <unit>/</unit>
                                          </span>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="list-unstyled">
                            <ul>
                                <li>Brands <a href="#"><?= $product_detail['name'] ?></a></li>
                                <?php if($product_detail['current_stock'] !== 0){
                                    $stock = 'In Stock';
                                    $cart_btn = "";
                                    $colrs = explode( ",",$product_detail['color']);
                                }else{ 
                                    $stock= 'Out of Stock';
                                     $cart_btn = "disabled";
                                     $colrs = NULL;
                                }
                                    ?>
                                <li>Availability: <a href="#"><?=$stock?></a></li>
                            </ul>
                        </div>
                        <div class="catagory-select mb-30">
                            <h3>Available Options</h3>
                            <form action="#">
                                <?php if($colrs !== NULL):?>
                                    <label for="#">Select:Color</label>
                                    <select class="sorter-options" data-role="sorter">
                                        <?php foreach($colrs AS $colrs):?>
                                            <option value="Product"><?=$colrs?></option>
                                        <?php endforeach;?>
                                    </select
                                <?php endif;?>
                            
                            </form>
                        </div>
                        <!--<div class="catagory-select mb-30">
                            <h3>Available Options</h3>
                            <form action="#">
                                <label for="#">Select:</label>
                                <select class="sorter-options" data-role="sorter">
                                    <option selected="selected" value="Lowest">Blue</option>
                                    <option value="Highest">White</option>
                                    <option value="Product">Green</option>
                                </select>
                            </form>
                        </div>-->
                        <form action="#">
                            <div class="quality-button">

                                <input  type="number" class="qty quantity-field cart_quantity" min="1"
                                        max="<?php echo $product_detail['current_stock']; ?>" name='qty'
                                        value="1" style="width: 100px;" id='<?=$product_detail['product_id'];?>'/>


                                <input type="button" value="+" onclick='increase_val();' class="plus"/>
                                <input type="button" value="-" onclick='decrease_val();' class="minus"/>
                            </div>
                            <button type="button" name="add_cart"
                                    class="btn btn-success add_cart" data-productname="<?=$product_detail['product_name']?>"
                                    data-price="<?=$product_detail['sale_price'];?>"
                                    data-productid="<?=$product_detail['product_id'];?>"
                                    <?=$cart_btn;?>
                                    title="Add to Cart">Add To Cart</button>
                            <div class="product-icon">

                                <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                        class="icon ion-android-options"></i></a>
                            </div>

                        </form>
                    </div>
                    <!-- zoom-product-details-end -->
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <!-- products-detalis-area-start -->
            <div class="products-detalis-area pt-80">
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-30 text-center">
                        <ul>
                            <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                            <li><a href="#Reviews" data-toggle="tab">Reviews (<strong><?=count($review)?></strong>)</a></li>
                            <li><a href="#Tags" data-toggle="tab">Add Tags</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Description">
                        <div class="col-lg-12">
                            <div class="tab-description">
                                <p>Bacon ipsum dolor sit amet ut nostrud chuck, voluptate adipisicing veniam kielbasa
                                    fugiat ex spare ribs. Incididunt sint officia non cow, ut et. Cillum porchetta
                                    tongue occaecat laborum bacon aliquip fatback flank dolore short loin ball tip
                                    bresaola deserunt dolor. Shoulder fugiat ut in ut tail swine dolore, capicola
                                    ullamco beef occaecat meatball. Laboris turkey in et chuck deserunt ad incididunt
                                    do.</p>
                                <p>Capicola chuck tongue, anim consequat leberkas laborum ut enim bacon. Ribeye
                                    hamburger pastrami nisi ad consectetur dolor exercitation pork belly officia brisket
                                    pariatur mollit nulla turkey. Est dolore nulla cupidatat pork chop. Sausage officia
                                    pastrami chicken.</p>
                                <p>Tail sed sausage magna quis commodo swine. Aliquip strip steak esse ex in ham hock
                                    fugiat in. Labore velit pork belly eiusmod ut shank doner capicola consectetur
                                    landjaeger fugiat excepteur short loin. Pork belly laboris mollit in leberkas qui.
                                    Pariatur swine aliqua pork chop venison veniam. Venison sed cow short loin bresaola
                                    shoulder cupidatat capicola drumstick dolore magna shankle.</p>
                                <p>Sunt tail est sirloin meatloaf shank, brisket tempor duis swine fugiat dolore. Spare
                                    ribs esse jowl consectetur hamburger quis magna. Doner andouille dolore eiusmod,
                                    shank short ribs sausage adipisicing ball tip drumstick et. Ribeye in tenderloin
                                    bresaola laborum eu voluptate dolor sausage.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Reviews">
                        <div class="col-lg-12">
                            <form class="reviews-form" method="post" onsubmit="return false;">
                                <div class="reviews-area">
                                    <h3>Reviews</h3>
                                    <?php if(count($review)<1):?>
                                        <p>Be the first to review “Apple 16Gb iPad Mini” </p>
                                    <?php else:?>
                                        <?php foreach($review as $review):?>
                                            <p><?=$review->review;?></p>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    <div class="rating-area mb-10" id="rating-area">
                                        <h4>Your Rating</h4>
                                        <!--<a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>-->
                                        <a href="#"><i id ="star" data-star ="1" class="fa fa-star"></i></a>
                                        <a href="#"><i id ="star" data-star ="2"class="fa fa-star"></i></a>
                                        <a href="#"><i id ="star" data-star ="3"class="fa fa-star"></i></a>
                                        <a href="#"><i id ="star" data-star ="4"class="fa fa-star"></i></a>
                                        <a href="#"><i id ="star" data-star ="5"class="fa fa-star"></i></a>
                                    </div>
                                    <div class="comment-form mb-10">
                                        <label>Your Review</label>
                                        <textarea name="comment" id="comment" cols="20" rows="7" required=""></textarea>
                                    </div>
                                    <div class="comment-form-author mb-10">
                                        <label>Name</label>
                                        <input name ="name" type="text" required=""/>
                                    </div>
                                    <div class="comment-form-email mb-10">
                                        <label>email</label>
                                        <input name="email" type="email" required=""/>
                                        <input type="hidden" name="product_id" value="<?=$product_detail['product_id'];?>"/>
                                    </div>
                                    <button type="submit">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Tags">
                        <div class="col-lg-12">
                            <div class="tab-description">
                                <p> Custom Tab Content here. <br/>
                                    Tail sed sausage magna quis commodo swine. Aliquip strip steak esse ex in ham hock
                                    fugiat in. Labore velit pork belly eiusmod ut shank doner capicola consectetur
                                    landjaeger fugiat excepteur short loin. Pork belly laboris mollit in leberkas qui.
                                    Pariatur swine aliqua pork chop venison veniam. Venison sed cow short loin bresaola
                                    shoulder cupidatat capicola drumstick dolore magna shankle. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab-area-end -->
            </div>
            <!-- products-detalis-area-end -->
        </div>
    </div>
</div>
<!-- shop-main-area-end -->
<!-- arrivals-area-start -->
<div class="arrivals-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-30 text-center">
                    <h2>Related Products</h2>
                    <p> Order online and have your products delivered to your closest store for free </p>
                </div>
            </div>
        </div>
        <!-- tab-area-start -->
        <div class="tab-content">
            <div class="row">
                <div class="product-active">
                    <div class="col-lg-12">
                        <!-- product-wrapper-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?= base_url() ?>frontend_assets/img/product/23.jpg" alt="product"
                                         class="primary"/>
                                    <img src="<?= base_url() ?>frontend_assets/img/product/24.jpg" alt="product"
                                         class="secondary"/>
                                </a>
                                <span class="sale">sale</span>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Add to Cart"><i
                                            class="icon ion-bag"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                            class="icon ion-android-options"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                            class="icon ion-android-open"></i></a>
                                </div>
                            </div>
                            <div class="product-content pt-20">
                                <div class="manufacture-product">
                                    <a href="#">Chanel</a>
                                    <div class="rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="#">Sopo Designs Woolrich Klettersack Backpack</a></h2>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">$122.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-wrapper-end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- product-wrapper-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?= base_url() ?>frontend_assets/img/product/31.jpg" alt="product"
                                         class="primary"/>
                                    <img src="<?= base_url() ?>frontend_assets/img/product/32.jpg" alt="product"
                                         class="secondary"/>
                                </a>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Add to Cart"><i
                                            class="icon ion-bag"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                            class="icon ion-android-options"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                            class="icon ion-android-open"></i></a>
                                </div>
                            </div>
                            <div class="product-content pt-20">
                                <div class="manufacture-product">
                                    <a href="#">Dior</a>
                                    <div class="rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="#">Topo Designs Woolrich Klettersack Backpack</a></h2>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">$122.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-wrapper-end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- product-wrapper-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?= base_url() ?>frontend_assets/img/product/7.jpg" alt="product"
                                         class="primary"/>
                                    <img src="<?= base_url() ?>frontend_assets/img/product/8.jpg" alt="product"
                                         class="secondary"/>
                                </a>
                                <span class="sale">sale</span>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Add to Cart"><i
                                            class="icon ion-bag"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                            class="icon ion-android-options"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                            class="icon ion-android-open"></i></a>
                                </div>
                            </div>
                            <div class="product-content pt-20">
                                <div class="manufacture-product">
                                    <a href="#">Chanel </a>
                                    <div class="rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="#">Dopo Designs Woolrich Klettersack Backpack</a></h2>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">$122.00</li>
                                        <li class="old-price">$98.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-wrapper-end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- product-wrapper-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?= base_url() ?>frontend_assets/img/product/11.jpg" alt="product"
                                         class="primary"/>
                                    <img src="<?= base_url() ?>frontend_assets/img/product/12.jpg" alt="product"
                                         class="secondary"/>
                                </a>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Add to Cart"><i
                                            class="icon ion-bag"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                            class="icon ion-android-options"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                            class="icon ion-android-open"></i></a>
                                </div>
                            </div>
                            <div class="product-content pt-20">
                                <div class="manufacture-product">
                                    <a href="#">Chanel</a>
                                    <div class="rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="#">Eopo Designs Woolrich Klettersack Backpack</a></h2>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">$98.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-wrapper-end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- product-wrapper-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?= base_url() ?>frontend_assets/img/product/33.jpg" alt="product"
                                         class="primary"/>
                                    <img src="<?= base_url() ?>frontend_assets/img/product/34.jpg" alt="product"
                                         class="secondary"/>
                                </a>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Add to Cart"><i
                                            class="icon ion-bag"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Compare this Product"><i
                                            class="icon ion-android-options"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i
                                            class="icon ion-android-open"></i></a>
                                </div>
                            </div>
                            <div class="product-content pt-20">
                                <div class="manufacture-product">
                                    <a href="#">IVY Moda</a>
                                    <div class="rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="#">Ropo Designs Woolrich Klettersack Backpack</a></h2>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">$142.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-wrapper-end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- tab-area-end -->
    </div>
</div>
<!-- arrivals-area-end -->
<!-- newslatter-area-start -->
<div class="newslatter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bt-top ptb-80">
                    <div class="newlatter-content text-center">
                        <h6>Special Offers For Subscribers</h6>
                        <h3>Ten Percent Member Discount</h3>
                        <p>Subscribe to our newsletters now and stay up to date with new collections, the latest
                            lookbooks and exclusive offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email address here..."/>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function decrease_val(){
        var value=$('.quantity-field').val();
        if(value > 1){
            var value=--value;
        }
        $('.quantity-field').val(value);
    }
    function increase_val(){
        var value=$('.quantity-field').val();
        var max_val =parseInt($('.quantity-field').attr('max'));
        if(value < max_val){
            var value=++value;
        }
        else if(value = max_val){
            toastr.warning("Stock Limit reached");
        }
        $('.quantity-field').val(value);
    }

</script>