<?php 

    class Request 
    {
        public function check($method)
        {
            if($_SERVER["REQUEST_METHOD"] == $method)
            {
                return true;
            }
        }
    }









?>