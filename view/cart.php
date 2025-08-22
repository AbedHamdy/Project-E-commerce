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
                                                    <td class="product_thumb"><a href="#"><img src="./storage/images/<?= $product["image"]; ?>" alt="Image of product"></a></td>
                                                    <td class="product_name"><?= $product["name"]; ?></td>
                                                    <td class="product-price">$<?= $currentPrice ?></td>
                                                    <td class="product_quantity">
                                                        <div class="input-group" style="max-width:140px;">
                                                            <button class="btn btn-outline-secondary btn-sm" type="button" onclick="stepQty(this, -1)">-</button>
                                                            <input type="number" name="quantity" class="form-control form-control-sm text-center qty-input" value="<?= $product['quantity']; ?>" min="1" max="<?= isset($product['stock']) ? (int)$product['stock'] : 100; ?>">
                                                            <button class="btn btn-outline-secondary btn-sm" type="button" onclick="stepQty(this, 1)">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="product_total">$<?= $total ?></td>
                                                    <td class="product_remove"><a href="./?page=deleteCart&product_id=<?= $product["id"]; ?>"><i class="ion-android-close"></i></a></td>
                                                    <td class="product_update">
                                                        <form action="./?page=updateCart" method="POST" onsubmit="return clampQty(this)">
                                                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                            <input type="hidden" name="quantity" value="<?= $product['quantity']; ?>" class="hidden-qty">
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
        
<script>
function getBounds(input){
    var min = parseInt(input.getAttribute('min') || '1', 10);
    var max = parseInt(input.getAttribute('max') || '100', 10);
    if (isNaN(min) || min < 1) min = 1;
    if (isNaN(max) || max < 1) max = 1;
    if (max < min) max = min;
    return {min:min, max:max};
}
function stepQty(btn, delta){
    var container = btn.closest('tr');
    var input = container.querySelector('.qty-input');
    var bounds = getBounds(input);
    var value = parseInt(input.value || '1', 10);
    if (isNaN(value)) value = bounds.min;
    value += delta;
    if (value < bounds.min) value = bounds.min;
    if (value > bounds.max) value = bounds.max;
    input.value = value;
    var hidden = container.querySelector('.hidden-qty');
    if (hidden) hidden.value = value;
    return false;
}
function clampQty(form){
    var row = form.closest('tr');
    var input = row.querySelector('.qty-input');
    var hidden = row.querySelector('.hidden-qty');
    if (!input || !hidden) return true;
    var bounds = getBounds(input);
    var value = parseInt(input.value || '1', 10);
    if (isNaN(value)) value = bounds.min;
    if (value < bounds.min) value = bounds.min;
    if (value > bounds.max) value = bounds.max;
    input.value = value;
    hidden.value = value;
    return true;
}
</script>

