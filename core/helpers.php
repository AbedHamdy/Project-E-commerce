<?php 

    function requestCheck($method)
    {
        if($_SERVER["REQUEST_METHOD"] == $method)
        {
            return true;
        }
    }

    























?>