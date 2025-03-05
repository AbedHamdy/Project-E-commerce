<?php 

    // echo "abed";
    // die;
    require_once("./env.php");
    require_once("./model/Product.php");

    $products = Product::getAllProducts();
    if($products > 0)
    {
        $_SESSION['products'] = $products;
        header("Location:./?page=product-details");
    }
    else 
    {
        $_SESSION['noProducts'] = "No Products Found";
        header("Location:./?page=product-details");
    }

?>