<?php 
    require_once("./inc/header.php"); 
    require_once("./inc/nav.php"); 

    $page = $_GET["page"] ?? "home";
    
    switch($page) 
    {
        case "home":
            require_once("./view/home.php");
            break;
        case "login":
            require_once("./view/login.php");
            break;
        case "register":
            require_once("./view/register.php");
            break;
    }
    
	
	
    require_once("./inc/footer.php"); 
?>