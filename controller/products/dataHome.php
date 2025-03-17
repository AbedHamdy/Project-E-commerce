<?php 

    require_once("./env.php");
    require_once("./model/Product.php");

    $productsHome = Product::dataHome();
    // var_dump($productsHome);
    // die;
    if($productsHome != 0)
    {
        $_SESSION["productsHome"] = $productsHome;
        $twoProduct = Product::limitProduct(2);
        if($twoProduct > 0)
        {
            $_SESSION["randProduct"] = $twoProduct;
            $threeProduct = Product::limitProduct(3);
            if($threeProduct > 0)
            {
                $_SESSION["otherProduct"] = $threeProduct;
                header("location:./?page=home");
            }
        }
    }
    else 
    {
        $_SESSION["noProductsHome"] = "no products available";
        header("location:./?page=home");
    }


?>