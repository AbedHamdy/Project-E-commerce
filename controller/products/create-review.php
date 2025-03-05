<?php 

    // echo "abed";
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
        // die;

        // validate id
        $validateId = new ValidateId($data["product_id"]);
        $errorId = $validateId->checkId();
        if($errorId === true)
        {
            $errors[] = $errorId;
        }

        // validate name
        $validateName = new ValidateName($data["name"]);
        $errorName = $validateName->checkName();
        if($errorName !== true)
        {
            $errors[] = $errorName;
        }

        // validate email
        $validateEmail = new ValidateEmail($data["email"]);
        $errorEmail = $validateEmail->checkEmail();
        if($errorEmail !== true)
        {
            $errors[] = $errorEmail;
        }

        // validate message 
        $validateMessage = new ValidateMessage($data["message"]);
        $errorMessage = $validateMessage->checkMessage();
        if($errorMessage !== true)
        {
            $errors[] = $errorMessage;
        }
        // var_dump($errors);
        // die;

        if(empty($errors))
        {
            require_once "./env.php";
            require_once "./model/Review.php";
            
            $review = new Review($data["name"], $data["email"], $data["message"], $data["product_id"]);
            $result = $review->setData();

            if($result > 0)
            {
                $success[] = "Review added successfully";
                $_SESSION["success"] = $success;
                header("location:./?page=product-details");
            }
        }
        else 
        {
            // var_dump($errors);
            // die;
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