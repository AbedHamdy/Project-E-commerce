<?php 

    // var_dump($_GET["product_id"]);
    $product_id = $_GET["product_id"];

    $dataDecode = file_get_contents("./storage/cart.json");
    $allProducts = json_decode($dataDecode, true);

    // var_dump($products);
    // die;

    $products =[];
    foreach($allProducts as $product)
    {
        if($product["id"] != $product_id)
        {
            $products[] = $product;
        }
    }

    $dataEncode = json_encode($products , JSON_PRETTY_PRINT);
    file_put_contents("./storage/cart.json" , $dataEncode);

    header("location:./?page=cart");

    // var_dump($products);

















?>