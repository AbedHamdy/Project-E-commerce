<?php

  session_start();
  require_once("./inc/header.php");
  // echo "abed";   
  // var_dump($_GET); 

  $page = $_GET["page"] ?? "dataHome";
  // echo $page;

  switch ($page) 
  {
    case "dataHome" :
      header("location:../index.php");
      break;
    case "data" :
      require_once("../controller/homeDetails.php");
      break;
    case "home" :
      require_once("./views/home.php");
      break;
    case "logout" :
      require_once("../controller/logout.php");
      break;
    case "add-product" :
      require_once("./views/addProduct.php");
      break;
    case "create-product" :
      require_once("../controller/products/create-product.php");
      break;
    case "orders" :
      require_once("../controller/orderDetails.php");
      break;
    case "showOrderDetails" :
      require_once("./views/showOrderDetails.php");
      break;
    case "update-status" :
      require_once("../controller/updateStatus.php");
      break;
  }












  require_once("./inc/footer.php");
?>