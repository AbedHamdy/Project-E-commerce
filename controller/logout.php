<?php 

    // var_dump($_SESSION["auth"]);

    session_unset(); 
    session_destroy(); 

    header("location:./?page=dataHome");







?>