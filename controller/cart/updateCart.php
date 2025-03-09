<?php 

    // echo "abed";
    // var_dump($_POST);
    // die;

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
            $dataDecode = file_get_contents("./storage/cart.json");
            $allProducts = json_decode($dataDecode, true);

            // var_dump($allProducts);

            $check = 0;
            foreach($allProducts as &$product)
            {
                if($product["id"] == $data["product_id"])
                {
                    $check++;
                    $product["quantity"] = $data["quantity"];
                }
            }

            if($check == 0)
            {
                $errors[] = "Product not found";
                $_SESSION["errors"] = $errors;
                header("location:./?cart");
                die;
            }
            else
            {
                $success[] = "Product successfully";
                $_SESSION["success"] = $success;
                $dataEncode = json_encode($allProducts , JSON_PRETTY_PRINT);
                file_put_contents("./storage/cart.json" , $dataEncode);
    
                header("location:./?page=cart");
            }

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