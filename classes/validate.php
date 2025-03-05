<?php 

    class Validate 
    {
        public function sanitizeInput($input)
        {
            return trim(htmlspecialchars(htmlentities($input)));
        }

        public function requireVal($input)
        {
            if(empty($input))
            {
                return true;
            }
            return false;
        }

        public function maxVal($input , $length)
        {
            if(strlen($input) > $length)
            {
                return true;
            }
        }

        public function minVal($input , $length)
        {
            if(strlen($input) < $length)
            {
                return true;
            }
        }

        public function numeric($input)
        {
            if(!is_numeric($input))
            {
                return true;
            }
        }
    }




?>