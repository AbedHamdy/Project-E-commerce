<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="./?page=home">home</a></li>
                        <li>Product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<?php 
    if(isset($_SESSION['noProducts'])) :
?>
    <div class="container">
        <div class="alert alert-warning text-center mt-4" role="alert" style="padding: 20px; border-radius: 10px; font-size: 18px;">
            <i class="fas fa-exclamation-circle"></i> <strong>No Products Found</strong>
        </div>
    </div>
<?php
    unset($_SESSION["noProducts"]);
    endif;
    // unset($_SESSION['noProducts']);
    if(isset($_SESSION['product'])) :
        $product = $_SESSION['product'];
        $currentPrice = $product["price"] - ($product["price"] * $product["discount"] / 100);
?>
<!--breadcrumbs area end-->
    
        <!--product details start-->
        <div class="product_details mt-60 mb-60">
            <div class="container">
                <div class="row">
                    <!-- photos -->
                    <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <img id="zoom1" src="<?= $product["image"]; ?>" data-zoom-image="<?= $product["image"]; ?>" alt="Product Image">
                            </div>
                            <!-- <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/details-2.jpg" data-zoom-image="assets/img/product/details-2.jpg">
                                            <img src="assets/img/product/details-2.jpg" alt="zo-th-1"/>
                                        </a>

                                    </li>
                                    <li >
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/details-3.jpg" data-zoom-image="assets/img/product/details-3.jpg">
                                            <img src="assets/img/product/details-3.jpg" alt="zo-th-1"/>
                                        </a>

                                    </li>
                                    <li >
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/details-4.jpg" data-zoom-image="assets/img/product/details-4.jpg">
                                            <img src="assets/img/product/details-4.jpg" alt="zo-th-1"/>
                                        </a>

                                    </li>
                                    <li >
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/details-1.jpg" data-zoom-image="assets/img/product/details-1.jpg">
                                            <img src="assets/img/product/details-1.jpg" alt="zo-th-1"/>
                                        </a>

                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right">
                            <form action="./?page=cart" method="POST"> 
                                <h1><?= $product["name"]; ?></h1>
                                <!-- rating for product -->
                                <!-- <div class=" product_ratting">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="review"><a href="#"> (250 reviews) </a></li>
                                    </ul>
                                </div> -->
                                <div class="price_box">
                                    <span class="current_price">$<?= $currentPrice; ?></span>
                                    <span class="old_price">$<?= $product["price"]; ?></span>
                                    
                                </div>
                                <!-- price , discount , description -->
                                <div class="product_desc">
                                    <ul>
                                        <li>In Stock</li>
                                        <li>Free delivery available*</li>
                                        <li>Sale <?= $product["discount"]; ?> Off Use Code : 'Drophut'</li>
                                    </ul>
                                    <p><?= $product["description"]; ?></p>
                                </div>
                                <div class="product_timing">
                                    <div data-countdown="2023/12/15"></div>
                                </div>
                                <!-- color -->
                                <div class="product_variant color">
                                    <h3>Available Options</h3>
                                    <label>color</label>
                                    <ul>
                                        <li class="color1"><a href="#"></a></li>
                                        <li class="color2"><a href="#"></a></li>
                                        <li class="color3"><a href="#"></a></li>
                                        <li class="color4"><a href="#"></a></li>
                                    </ul>
                                </div>
                                <!-- quantity -->
                                <div class="product_variant quantity">
                                    <label>quantity</label>
                                    <input min="1" max="100" value="1" type="number">
                                    <input type="hidden" name="product_id" value="<?= $product["id"]; ?>">
                                    <button class="button" type="submit">add to cart</button>  
                                </div>
                                <!-- action -->
                                <div class=" product_d_action">
                                <ul>
                                    <li><a href="./?page=wishlist" title="Add to wishlist">+ Add to Wishlist</a></li>
                                    <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                                </ul>
                                </div>
                                <!-- categories -->
                                <div class="product_meta">
                                    <span>Category: <?= $product["category_name"]; ?></span>
                                </div>
                            </form>
                            <!-- social media -->
                            <div class="priduct_social">
                                <ul>
                                    <li><a class="facebook" href="https://www.facebook.com/profile.php?id=100046706022227" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                    <li><a class="twitter" href=" https://x.com/Abdelrahman9129?t=tzWxqb7sIWyQ2LOey4Cv3A&s=08" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="linkedin" href="https://www.linkedin.com/in/abed-hamdy-bb491925b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                                </ul>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <!--product details end-->
<?php
    // unset($_SESSION['product']);
    endif; 
?>

    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                                <li>
                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p><?= $product["description"]; ?></p>
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product_d_table">
                                   <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th class="first_child">Advantages</th>
                                                    <!-- <td class="first_child">Compositions</td>
                                                    <td>Polyester</td> -->
                                                </tr>
                                                <tr>
                                                    <td class="first_child"><?= $product["advantages"]; ?></td>
                                                    <!-- <td class="first_child">Styles</td>
                                                    <td>Girly</td> -->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p><?= $product["description"]; ?></p>
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2><?= $_SESSION["reviews"]["count"]; ?> review for Donec eu furniture</h2>
                                    <?php 
                                        if(isset($_SESSION["reviews"])) : 
                                            $reviews = $_SESSION["reviews"]["reviews"];
                                            foreach($reviews as $review) :
                                    ?>
                                                <div class="reviews_comment_box">
                                                    <div class="comment_thmb">
                                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                                    </div>
                                                    <div class="comment_text">
                                                        <div class="reviews_meta">
                                                            <!-- <div class="star_rating">
                                                                <ul>
                                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                </ul>   
                                                            </div> -->
                                                            <p><strong><?= $review["name"]; ?></strong>- <?= $review["created_at"]; ?></p>
                                                            <span><?= $review["message"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php 
                                                endforeach;
                                            endif;
                                        ?>
                                    <div class="comment_title">
                                        <h2>Add a review</h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <!-- <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div> -->
                                    <div class="product_review_form">
                                        <?php 
                                            if(isset($_SESSION["errors"])) :
                                                foreach($_SESSION["errors"] as $error) :
                                        ?>
                                                    <div class='alert alert-danger'><?= $error ?></div>
                                        <?php 
                                                endforeach;
                                                unset($_SESSION["errors"]);
                                            endif;
                                        ?>
                                        <form action="./?page=create-review" method="POST">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="message" id="review_comment" ></textarea>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="name">Name</label>
                                                    <input id="name" name="name" type="text">

                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" name="email" type="email">
                                                </div>  
                                                <input type="hidden" name="product_id" value="<?= $product["id"]; ?>">
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>   
                                    </div> 
                                </div>     
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->


