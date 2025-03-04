<?php 

    require_once("validate.php");

    class ValidateEmail extends Validate
    {
        private $email;
        public function __construct($email)
        {
            $this->email = $this->sanitizeInput($email);
        }

        public function checkEmail()
        {
            if($this->requireVal($this->email))
            {
                return "Email is required";
            }
            else if(!filter_var($this->email , FILTER_VALIDATE_EMAIL))
            {
                return "Email is not valid";
            }
            return true;
        }
    }

?>