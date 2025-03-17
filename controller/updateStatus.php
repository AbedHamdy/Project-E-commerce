<?php 

    // var_dump($_POST);
    // die;

    spl_autoload_register(function($class)
    {
        require_once "../classes/$class.php";
    });

    $request = new Request;
    $request->check("POST");

    if($request)
    {
        foreach($_POST as $key => $value)
        {
            $data[$key] = $value;
        }

        // validate id
        $validateId = new ValidateId($data["order_id"]);
        $errorId = $validateId->checkId();
        if($errorId !== true)
        {
            $errors[] = $errorId;
        }

        // validate status
        $validateStatus = new ValidateString($data["status"]);
        $errorStatus = $validateStatus->checkWord();

        if($errorStatus !== true)
        {
            $errors[] = $errorStatus;
        }

        // var_dump($errors);
        // die;
        if(empty($errors))
        {
            require_once "../env.php";
            require_once("../model/Order.php");

            $changed = Order::changeStatus($data["status"] , $data["order_id"]);

            if($changed == 1)
            {
                $success= "Change status order was successful";
                $_SESSION["successUpdate"] = $success;
                header("location:./?page=dataHome");
            }
            else 
            {
                $errors= "Error 404";
                $_SESSION["errorsUpdate"] = $errors;
                header("location:./?page=showOrderDetails");
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            header("location:./page=showOrderDetails");
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