<?php 

    // var_dump($_POST);
    // require_once("./classes/ValidateString.php");
    if(!isset($_SESSION["auth"]))
    {
        header("location:./?page=login&comeFrom=check");
        die;
    }
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

        // validate first name
        $validateFirstName = new ValidateName($data["fname"]);
        $errorFirstName = $validateFirstName->checkName();
        if($errorFirstName !== true)
        {
            $errors[] = $errorFirstName;
        }

        // validate last name
        $validateLastName = new ValidateName($data["lname"]);
        $errorLastName = $validateLastName->checkName();
        if($errorLastName !== true)
        {
            $errors[] = $errorLastName;
        }

        // validate company 
        $validateCompany = new ValidateString($data["company"]);
        $errorCompany = $validateCompany->checkWord();
        if($errorCompany !== true)
        {
            $errors[] = $errorCompany;
        }

        // validate country 
        $validateCountry = new ValidateString($data["country"]);
        $errorCountry = $validateCountry->checkWord();
        if($errorCountry !== true)
        {
            $errors[] = $errorCountry;
        }
        
        // validate street 
        $validateStreet = new ValidateString($data["street"]);
        $errorStreet = $validateStreet->checkWord();
        if($errorStreet !== true)
        {
            $errors[] = $errorStreet;
        }

        // validate city 
        $validateCity = new ValidateString($data["city"]);
        $errorCity = $validateCity->checkWord();
        if($errorCity !== true)
        {
            $errors[] = $errorCity;
        }

        // validate phone
        $validatePhone = new ValidateId($data["phone"]);
        $errorPhone = $validatePhone->checkId();
        if($errorPhone === true || empty($data["phone"]))
        {
            $errors[] = "The phone must be numeric";
        } 

        // validate email
        $validateEmail = new ValidateEmail($data["email"]);
        $errorEmail = $validateEmail->checkEmail();
        if($errorEmail !== true)
        {
            $errors[] = $errorEmail;
        }

        // validate note
        $validateNote = new ValidateMessage($data["note"]);
        $errorNote = $validateNote->checkMessage();
        if($errorNote !== true)
        {
            $errors[] = $errorNote;
        }

        if(empty($errors))
        {
            $dataDecode = file_get_contents("./storage/cart.json");
            $allProducts = json_decode($dataDecode, true);
            // var_dump($allProducts);
            // die;
            $total = 0;
            foreach ($allProducts as $product)
            {
                $currentPrice = ($product["price"] - ($product["price"] * $product["discount"] / 100)) * $product["quantity"];
                $total += $currentPrice;
            }
            // echo $total;
            // die;
            // var_dump($data);
            require_once "./env.php";
            require_once("./model/Order.php");

            $order = new Order($_SESSION["auth"]["id"] , $total , $data["fname"] , $data["lname"] , $data["country"] , $data["street"] , $data["city"] , $data["phone"] , $data["note"] , $data["email"]);
            $order_id = $order->setData();
            // var_dump($product_id);
            // die;

            foreach($allProducts as $product)
            {
                $price = ($product["price"] - ($product["price"] * $product["discount"] / 100));

                require_once "./env.php";
                require_once("./model/OrderProduct.php");
                
                $product_id = $product["id"];
                $quantity = $product["quantity"];

                $addOrder = new OrderProduct($order_id , $product_id , $quantity , $price);
                $res = $addOrder->setData();

                if($res == -1)
                {
                    // echo "abed";
                    // die;
                    header("location:./?page=404");                    
                }
                // else "no";die;
            }

            $success[] = "Order added successfully";
            $_SESSION["success_order"] = $success;
            
            file_put_contents("./storage/cart.json", json_encode([]));

            header("location:./?home");


            
        }
        else 
        {
            // var_dump($errors);
            $_SESSION["errors_order"] = $errors;
            header("location:./?page=checkout");
        }



    }
    else 
    {
        $errors[] = "Invalid request";
        $_SESSION["errors_order"] = $errors;
        header("location:./?page=404");
        die;
    }







?>