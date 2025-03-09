<?php 

    // echo "abed";
    // var_dump($_GET);
    // die;
    $numberProduct = $_GET["product_id"];
    // echo $numberProduct ;
    // die;
    
    require_once("./env.php");
    require_once("./model/Product.php");
    require_once("./model/Review.php");
    
    $product = Product::productDetails($numberProduct);
    if($product > 0)
    {
        // var_dump($product);
        // die;
        $_SESSION['product'] = $product;
        $reviews = Review::getAllReviews($numberProduct);
        if($reviews !== -1)
        {
            $_SESSION['reviews'] = $reviews;
            header("Location:./?page=product-details");
        }
        else
        {
            header("Location:./?page=product-details");
        }
    }
    else 
    {
        $_SESSION['noProducts'] = "No Products Found";
        header("Location:./?page=product-details");
    }

?>