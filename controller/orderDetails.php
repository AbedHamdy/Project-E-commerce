<?php 

    // echo "orderDetails";

    require_once("../env.php");
    require_once("../model/Order.php");

    $orders = Order::getData();

    $_SESSION["orderDetails"] = $orders;
    // var_dump($_SESSION["orderDetails"]);
    // die;
    header("location:./?page=showOrderDetails");






?>