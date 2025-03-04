<?php 

    require_once("validate.php");

    class ValidatePassword extends Validate 
    {
        private $password;
        public function __construct($password)
        {
            $this->password = $this->sanitizeInput($password);
        }

        public function checkPassword()
        {
            if($this->requireVal($this->password))
            {
                return "Password is required";
            }
            else if($this->maxVal($this->password , 255))
            {
                return "Password is too long";
            }
            else if($this->minVal($this->password , 6))
            {
                return "Password is too short";
            }
            return true;
        }
    }


?>