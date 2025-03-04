<?php 

    // require_once("../classes/request-check.php");
    session_start();
    spl_autoload_register(function($class)
    {
        require_once "../classes/$class.php";
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
            require_once "../model/User.php";
            $user = new User($data["name"], $data["email"], sha1($data["password"]));
            $user->setData();
            $_SESSION["auth"] = $data["email"];
            header("location:../?page=home");
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            header("location:../?page=register");
        }
    }
    else 
    {
        header("location:../?page=404");
    }













?>