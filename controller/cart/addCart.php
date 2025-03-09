<?php 

    spl_autoload_register(function($class)
    {
        require_once "./classes/$class.php";
    });

    $errors = [];
    $success = [];
    $request = new Request;
    $request->check("POST");
    if($request)
    {
        foreach($_POST as $key => $value)
        {
            $data[$key] = $value;
        }

        // var_dump($data);
        // die;

        // validate quantity
        $validateId = new ValidateId($data["quantity"]);
        $errorQuant = $validateId->checkId();
        if($errorQuant === true)
        {
            $errors[] = $errorQuant;
        }

        // validate product_id 
        $validateId = new ValidateId($data["product_id"]);
        $errorId = $validateId->checkId();
        if($errorId === true)
        {
            $errors[] = $errorId;
        }

        if(empty($errors))
        {
            require_once("./env.php");
            require_once("./model/Product.php");

            $product = Product::productDetails($data["product_id"]);
            // var_dump($product);
            // die;
            if($product > 0)
            {
                $product["quantity"] = $data["quantity"]; 

                $dataDecode = file_get_contents("./storage/cart.json");
                $products = !empty($dataDecode) ? json_decode($dataDecode, true) : []; 

                if (!is_array($products)) 
                {
                    $products = [];
                }

                $found = false;

                foreach ($products as &$product1) 
                { 
                    if (isset($product1["id"]) && $product1["id"] == $data["product_id"]) 
                    {
                        $product1["quantity"] = $data["quantity"];
                        $found = true;
                        break;
                    }
                }

                if (!$found) 
                {
                    $products[] = $product; 
                }

                file_put_contents("./storage/cart.json", json_encode($products, JSON_PRETTY_PRINT));
                // $success[] = "product added successfully to cart";
                // $_SESSION["success"] = $success;
                header("location:./?page=cart");

            }
            else 
            {
                $errors[] ="Product details not found";
                $_SESSION["errors"] = $errors;
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            header("location:./?page=product-details");
            die;
        }
    }
    else 
    {
        $errors[] = "Invalid request";
        $_SESSION["errors"] = $errors;
        header("location:./?page=404");
        die;
    }













?>