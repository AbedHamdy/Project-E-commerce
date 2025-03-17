<?php 
    if(isset($_SESSION["cartEmpty"])) : 
?>
        <div class="alert alert-warning text-center" role="alert" style="font-size: 18px; padding: 15px;">
            Cart is empty
        </div>
<?php 
        unset($_SESSION["cartEmpty"]);
    endif;
?>
<!--slider area start-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>Next level of Drone</h1>
                                <h2>Insane Quality for use</h2>
                                <p>Special offer <span> 20% off </span> this week</p>
                                <a class="button" href="./?page=product-details">Buy now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>Best Camera Included</h1>
                                <h2>100% Flexible</h2>
                                <p>exclusive offer <span> 20% off </span> this week</p>
                                <a class="button" href="./?page=product-details">Shop now</a>
                            </div>
                        </div>                        
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>With some gifts</h1>
                                <h2>Special one for you</h2>
                                <p>exclusive offer <span> 20% off </span> this week</p>
                                <a class="button" href="./?page=product-details">shopping now</a>
                            </div>
                        </div>                      
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Tranding Products</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php 
                    if(isset($_SESSION["productsHome"])) :
                        foreach($_SESSION["productsHome"] as $product) : 
                            $currentPrice = $product["price"] - ($product["price"] * $product["discount"] / 100);
                ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="single-tranding">
                                    <a href="./?page=products&product_id=<?= $product["id"]; ?>">
                                        <div class="tranding-pro-img">
                                            <!-- assets/img/product/tranding-1.jpg -->
                                            <img src="./storage/images/<?= $product["image"]; ?>" alt="Image of product">
                                        </div>
                                        <div class="tranding-pro-title">
                                            <h3><?= $product["name"]; ?></h3>
                                            <h4>Drone</h4>
                                        </div>
                                        <div class="tranding-pro-price">
                                            <div class="price_box">
                                                <span class="current_price">$<?= $currentPrice; ?></span>
                                                <span class="old_price">$<?= $product["price"]; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                <?php 
                        endforeach;
                    elseif(isset($_SESSION["noProductsHome"])) :
                ?>
                        <div class="alert alert-warning text-center" role="alert" style="font-size: 18px; padding: 15px;">
                            No products available at the moment!
                        </div>
                <?php 
                    endif;
                ?>
            </div>
        </div>
    </section>
    <!--Tranding product-->

    <!--Features area-->
    <section class="features-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Awesome Features</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/1.png" alt="">
                        <h3>Impressive Distance</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/2.png" alt="">
                        <h3>100% self safe</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/3.png" alt="">
                        <h3>Awesome Support</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <a"><img src="assets/img/product/2.png" alt=""></a>
                </div>
            </div>
        </div>
    </section><!--Features area-->

    <!--Features area-->
    <section class="gray-bg pt-60 pb-60">
        <div class="container">
            <?php 
                if(isset($_SESSION["randProduct"])) :
                    foreach($_SESSION["randProduct"] as $product) :
            ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1 order-sm-1">
                                <div class="pro-details-feature">
                                    <!-- assets/img/product/1.png -->
                                    <img src="./storage/images/<?= $product["image"]; ?>" alt="Image of product">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-2 order-md-2 order-sm-2">
                                <div class="pro-details-feature">
                                    <h3><?= $product["name"]; ?></h3>
                                    <p><?= $product["description"]; ?></p>
                                    <ul>
                                        <li><?= $product["advantages"]; ?></li>
                                    </ul>
                                    <a href="./?page=cart&product_id=<?= $product["id"]; ?>">$<?= $product["price"]; ?> Buy now</a>
                                </div>
                            </div>
                        </div>
            <?php 
                    endforeach;
                elseif(isset($_SESSION["noProductsHome"])) :
            ?>
                    <div class="alert alert-warning text-center" role="alert" style="font-size: 18px; padding: 15px;">
                        No products available at the moment!
                    </div>
            <?php 
                endif;
            ?>
        </div>
    </section><!--Features area-->

    
    

    
    <!--area-->
    <section class="pt-60 pb-60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Watch it now</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/136938394?color=FA5252&amp;title=0&amp;byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="../../../player.vimeo.com/api/player.js"></script>
                </div>
            </div>
        </div>
    </section><!--area-->

    
    <!--Other product-->
    <section class="pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Other collections</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php 
                    if(isset($_SESSION["otherProduct"])) :
                        foreach($_SESSION["otherProduct"] as $product) : 
                            $currentPrice = $product["price"] - ($product["price"] * $product["discount"] / 100);
                ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="single-tranding mb-30">
                                    <a href="./?page=products&product_id=<?= $product["id"]; ?>">
                                        <div class="tranding-pro-img">
                                            <!-- assets/img/product/tranding-1.jpg -->
                                            <img src="./storage/images/<?= $product["image"]; ?>" alt="Image of product">
                                        </div>
                                        <div class="tranding-pro-title">
                                            <h3><?= $product["name"]; ?></h3>
                                            <h4>Drone</h4>
                                        </div>
                                        <div class="tranding-pro-price">
                                            <div class="price_box">
                                                <span class="current_price">$<?= $currentPrice; ?></span>
                                                <span class="old_price">$<?= $product["price"]; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                <?php 
                        endforeach;
                    elseif(isset($_SESSION["noProductsHome"])) :
                ?>
                        <div class="alert alert-warning text-center" role="alert" style="font-size: 18px; padding: 15px;">
                            No products available at the moment!
                        </div>
                <?php 
                    endif;
                ?>
            </div>
        </div>
    </section><!--Other product-->

    <!--Testimonials-->
    <section class="pb-60 pt-60 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial_are">
                        <div class="testimonial_active owl-carousel">       
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45</p>
                                        <h3><a href="https://www.facebook.com/eraasoft?mibextid=XpYurLm33tLCrMNh">Mustafa Mahfouz</a><span> - CEO of EraaSoft</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even</p>
                                        <h3><a href="https://www.linkedin.com/in/mohamed-salah-165b9b155?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Mohammed Salah</a><span> - Customer</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-1.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
                                        <h3><a href="https://www.linkedin.com/in/ziad-mohamed-20b540238?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Zyad Mohammed</a><span> - Manager of AZ</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article>      
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Testimonials-->

    <!--Blog-->
    <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row blog_wrapper">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">How to start drone</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog blog_bidio mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">See the tutorial</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date">On : <a href="#">Aug 25, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-details.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">How to start drone</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section><!--/Blog-->

    <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </section>
    <!--shipping area end-->