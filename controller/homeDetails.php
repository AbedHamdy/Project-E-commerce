<?php 

    // echo "abed";

    require_once("../env.php");
    require_once("../model/Product.php");
    
    $numberProducts = Product::numberProducts();
    if($numberProducts >= 0)
    {
        // var_dump( $numberProducts);
        // die;
        $_SESSION["numberProducts"] = $numberProducts;

        require_once("../model/User.php");
        $numberUsers = User::numberUsers();
        
        if($numberUsers >= 0)
        {
            $_SESSION["numberUsers"] = $numberUsers;

            require_once("../model/Order.php");
            $numberOrders = Order::numberOrders();
            if($numberOrders >= 0)
            {
                $_SESSION["numberOrders"] = $numberOrders;
                header("location:./?page=home");
            }
        }
    }
    else 
    {
        $errors = "Error 404";
        $_SESSION["errors"] = $errors;
        header("location:./?page=home");
    }









?>