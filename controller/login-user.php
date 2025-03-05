<?php 

    spl_autoload_register(function($class)
    {
        require_once "./classes/$class.php";
    });

    $errors = [];
    $request = new Request;
    $request->check("POST");

    if($request)
    {
        foreach($_POST as $key => $value)
        {
            $data[$key] = $value;
        }

        // validate email
        $validateEmail = new ValidateEmail($data["email"]);
        $errorEmail = $validateEmail->checkEmail();
        if($errorEmail !== true)
        {
            $errors[] = $errorEmail;
        }

        // validate password
        $validatePassword = new ValidatePassword($data["password"]);
        $errorPassword = $validatePassword->checkPassword();
        if($errorPassword !== true)
        {
            $errors[] = $errorPassword;
        }

        if(empty($errors))
        {
            require_once "./env.php";
            require_once("./model/Customer.php");

            $customer = new Customer($data["email"], sha1($data["password"]));
            $clint = $customer->checkAccount();
            // var_dump($clint);
            // die;
            
            if($clint !== NULL)
            {
                $_SESSION["auth"] = 
                    [
                        "id" => $clint["id"],
                        "name" => $clint["name"],
                        "email" => $data["email"]
                    ];
                    // var_dump($_SESSION["auth"]);
                    // die;
                header("location:./?page=home");
            }
            else 
            {
                $errors[] = "Invalid email or password";
                $_SESSION["errors"] = $errors;
                // var_dump($errors);
                // die;

                header("location:./?page=login");
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            header("location:./?page=login");
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