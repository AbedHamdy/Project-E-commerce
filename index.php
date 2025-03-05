<?php 
    ob_start(); 
    session_start();
    require_once("./inc/header.php"); 
    // require_once("./inc/nav.php"); 

    // $page = $_GET["page"] ?? "home";
    // var_dump($page);
    // die;
    
    $page = $_GET["page"] ?? "dataHome";

    switch($page) 
    {
        case "dataHome":
            require_once("./controller/products/dataHome.php");
            break;
        case "home":
            require_once("./view/home.php");
            break;
        case "login":
            require_once("./view/login.php");
            break;
        case "login-user":
            require_once("./controller/login-user.php");
            break;
        case "register":
            require_once("./view/register.php");
            break;
        case "create-user":
            require_once("./controller/create-user.php");
            break;
        case "my-account":
            require_once("./view/my-account.php");
            break;
        case "products":
            require_once("./controller/products/get-product.php");
            break;
        case "product-details":
            require_once("./view/product-details.php");
            break;
        case "cart":
            require_once("./view/cart.php");
            break;
        case "create-review":
            require_once("./controller/products/create-review.php");
            break;
        case "wishlist":
            require_once("./view/wishlist.php");
            break;
// =================================================================
        case "about":
            require_once("./view/about.php");
            break;
        case "blog":
            require_once("./view/blog.php");
            break;
        case "contact":
            require_once("./view/contact.php");
            break;
        case "services":
            require_once("./view/services.php");
            break;
        case "wishlist":
            require_once("./view/wishlist.php");
            break;
        case "faq":
            require_once("./view/faq.php");
            break;
        default:
            require_once("./view/404.php"); 
            break;
    }
	
    require_once("./inc/footer.php"); 
	ob_end_flush(); 
?>