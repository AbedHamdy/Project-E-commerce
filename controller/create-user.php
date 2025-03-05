<?php 

    // echo "abed";
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

        // validate password
        $validatePassword = new ValidatePassword($data["password"]);
        $errorPassword = $validatePassword->checkPassword();
        if($errorPassword !== true)
        {
            $errors[] = $errorPassword;
        }
        // var_dump($errors);
        // die;
        if(empty($errors))
        {
            // var_dump($errors);
            // var_dump($data);
            // die;
            require_once "./env.php";
            require_once "./model/User.php";
            $user = new User($data["name"], $data["email"], sha1($data["password"]));
            $userID = $user->setData();
            // var_dump($userID);
            // die;
            if($userID > 0)
            {
                // var_dump($userID);
                // die;
                $_SESSION["auth"] = 
                    [
                        "id" => $userID,
                        "name" => $data["name"],
                        "email" => $data["email"]
                    ];
                
                // var_dump($_SESSION["auth"]);
                // die;
                header("location:./?page=home");
                die;
            }
            else if($userID == "0")
            {
                $errors[] = "Email already exists";
                $_SESSION["errors"] = $errors;
                header("location:./?page=register");
                die;
            }
            else 
            {
                $_SESSION["errors"] = ["Error in creating user"];
                header("location:./?page=register");
                die;
            }
            // header("location:../?page=home");
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            header("location:./?page=register");
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