    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="./?page=home">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12">
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="./?login" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true" aria-controls="checkout_login">Click here to login</a>     

                        </h3>
                        <div id="checkout_login" class="collapse" data-parent="#accordionExample">
                            <div class="checkout_info">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>  
                                <form action="#">  
                                    <div class="form_group">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">     
                                    </div>
                                    <div class="form_group">
                                        <label>Password  <span>*</span></label>
                                        <input type="text">     
                                    </div> 
                                    <div class="form_group group_3 ">
                                        <button type="submit">Login</button>
                                        <label for="remember_box">
                                            <input id="remember_box" type="checkbox">
                                            <span> Remember me </span>
                                        </label>     
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>          
                            </div>
                        </div>    
                    </div>
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Get any promo code?
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true" aria-controls="checkout_coupon">Click here to enter your code</a>     

                        </h3>
                        <div id="checkout_coupon" class="collapse" data-parent="#accordionExample">
                            <div class="checkout_info">
                                <form action="#">
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </form>
                            </div>
                        </div>    
                    </div>    
                </div>
            </div> -->
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="./?page=create_order" method="POST">
                            <?php 
                                if(isset($_SESSION["errors_order"])) :
                                    foreach($_SESSION["errors_order"] as $error) :
                            ?>
                                        <div class="alert alert-danger"><?= $error; ?></div>
                            <?php 
                                    endforeach;
                                    unset($_SESSION["errors_order"]);
                                endif;
                            ?>
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <label for="firstName">First Name <span>*</span></label>
                                    <input id="firstName" name="fname" type="text">    
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label for="lastName">Last Name  <span>*</span></label>
                                    <input id="lastName" name="lname" type="text"> 
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="company">Company Name</label>
                                    <input id="company" name="company" type="text">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="country">country <span>*</span></label>
                                    <input id="country" name="country" type="text">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="street">Street address  <span>*</span></label>
                                    <input id="street" name="street" placeholder="House number and street name" type="text">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="city">Town / City <span>*</span></label>
                                    <input id="city" name="city"  type="text">    
                                </div>  
                                <div class="col-lg-6 mb-20">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input id="phone" name="phone" type="text"> 

                                </div> 
                                <div class="col-lg-6 mb-20">
                                    <label for="email"> Email Address   <span>*</span></label>
                                    <input id="email" name="email" type="text"> 

                                </div> 
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" name="note" rows="2" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>    
                                </div>  
                                <div class="order_button">
                                    <button type="submit">Proceed to buy</button>
                                </div>   	    	    	    	    	    	    
                            </div>
                        </form>    
                    </div>
                    <div class="col-lg-6 col-md-6">  
                        <h3>Your order</h3> 
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $dataDecode = file_get_contents("./storage/cart.json");
                                        $allProducts = json_decode($dataDecode, true);
                                        // var_dump($allProducts);
                                        $total = 0;
                                        foreach ($allProducts as $product) : 
                                            $currentPrice = ($product["price"] - ($product["price"] * $product["discount"] / 100)) * $product["quantity"];
                                            $total += $currentPrice;
                                    ?>
                                            <tr>
                                                <td> <?= $product["name"]; ?> <strong> × <?= $product["quantity"]; ?></strong></td>
                                                <td> $<?= $currentPrice; ?></td>
                                            </tr>
                                    <?php 
                                        endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>$<?= $total; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>$5.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>$<?= $total + 5; ?></strong></td>
                                    </tr>
                                </tfoot>
                            </table>     
                        </div> 
                    </div>
                </div>
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->

 