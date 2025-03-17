<?php 

    // echo "abed";
    // var_dump($_POST);
    // var_dump($_FILES["image"]);
    // die;

    spl_autoload_register(function($class)
    {
        require_once "../classes/$class.php";
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

        // validate name
        $validateName = new ValidateName($data["name"]);
        $errorName = $validateName->checkName();
        if($errorName !== true)
        {
            $errors[] = $errorName;
        }

        // validate price
        $validatePrice = new ValidateId($data["price"]);
        $errorPrice = $validatePrice->checkId();
        if($errorPrice !== true)
        {
            $errors[] = "Price is required";
        }
        
        // validate discount
        $validateDiscount = new ValidateId($data["discount"]);
        $errorDiscount = $validateDiscount->checkId();
        if($errorDiscount !== true)
        {
            $errors[] = "Discount is required";
        }

        // validate description 
        $validateDescription = new ValidateMessage($data["description"]);
        $errorDescription = $validateDescription->checkMessage();
        if($errorDescription !== true)
        {
            $errors[] = $errorDescription;
        }
        
        // validate advantages 
        $validateAdvantages = new ValidateMessage($data["advantages"]);
        $errorAdvantages = $validateAdvantages->checkMessage();
        if($errorAdvantages !== true)
        {
            $errors[] = $errorAdvantages;
        }

        // var_dump($errors);
        // die;

        // validate image
        $validateImage = ValidateImage::saveImage($_FILES["image"] , "../storage/images/");
        if($validateImage == -1 )
        {
            $errors[] = "Image error";
        }

        if(empty($errors))
        {
            require_once "../env.php";
            require_once "../model/Product.php";

            $product = new Product($data["name"] ,$data["price"] , $data["discount"] ,$data["description"] , $data["advantages"] , $validateImage , 1);
            $result = $product->setData();


            echo "abed";
            if($result)
            {
                // echo "abed";
                // die;
                $success = "Product created successfully";
                $_SESSION["success"] = $success;
                // var_dump($_SESSION["success"]);
                header("location:./?dataHome");
            }
            else 
            {
                $errors[] = "error 404";
                $_SESSION["errors"] = $errors;
                header("location:./?page=add-product");
            }
            
        }
        else 
        {
            // echo "errors";
            // die;
            $_SESSION["errors"] = $errors;
            // var_dump($_SESSION["errors"]);
            header("location:./?page=add-product");
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