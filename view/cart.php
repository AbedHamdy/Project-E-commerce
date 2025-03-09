<?php 
// var_dump($_SESSION["auth"]);
    $dataDecode = file_get_contents("./storage/cart.json");
    $products = json_decode($dataDecode, true);
    if (!is_array($products)) 
    {
        $products = [];
    }
    // var_dump($products);
?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-2.html">home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <?php 
        if(isset($_SESSION["errors"])) : 
            foreach($_SESSION["errors"] as $error) :
    ?>
                <div class="alert alert-danger"><?= $error; ?></div>
    <?php 
            endforeach;
        endif;
    ?>
    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">  
            <!-- <form action="#"> -->
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Remove</th>
                                            <th class="product_remove">Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total = 0;
                                            foreach ($products as $product) :
                                                $currentPrice = $product["price"] - ($product["price"] * $product["discount"] / 100);
                                                $total = $currentPrice * $product["quantity"];
                                        ?> 
                                                <tr>
                                                    <td class="product_thumb"><a href="#"><img src="<?= $product["image"]; ?>" alt="Image of product"></a></td>
                                                    <td class="product_name"><?= $product["name"]; ?></td>
                                                    <td class="product-price">$<?= $currentPrice ?></td>
                                                    <td class="product_quantity"><?= $product["quantity"]; ?></td>
                                                    <td class="product_total">$<?= $total ?></td>
                                                    <td class="product_remove"><a href="./?page=deleteCart&product_id=<?= $product["id"]; ?>"><i class="ion-android-close"></i></a></td>
                                                    <td class="product_update">
                                                        <form action="./?page=updateCart" method="POST">
                                                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                            <input type="number" name="quantity" class="form-control" value="<?= $product['quantity']; ?>" min="1">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php 
                                            endforeach;
                                        ?>
                                    </tbody>
                                </table>   
                            </div>       
                        </div>
                    </div>
                </div>

                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <?php 
                                        $total = 0;
                                        foreach($products as $product) : 
                                            $currentPrice = ($product["price"] - ($product["price"] * $product["discount"] / 100)) * $product["quantity"];
                                            $total += $currentPrice;
                                    ?>
                                            <div class="cart_subtotal">
                                                <p><?= $product["name"]; ?></p>
                                                <p class="cart_amount">$<?= $currentPrice; ?></p>
                                            </div>
                                    <?php 
                                        endforeach;
                                    ?>
                                <a>Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">$<?= $total; ?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="./?page=checkout">Proceed to Checkout</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            <!-- </form>     -->
        </div>     
    </div>
    <!--shopping cart area end -->
        

