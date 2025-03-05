<?php 

    require_once("validate.php");
    class ValidateMessage extends Validate
    {
        private $message;
        public function __construct($message)
        {
            $this->message = $this->sanitizeInput($message);
        }

        public function checkMessage()
        {
            if($this->requireVal($this->message))
            {
                return "message is required";
            }
            else if($this->maxVal($this->message , 500))
            {
                return "message is too long";
            }
            else if($this->minVal($this->message , 3))
            {
                return "message is too short";
            }
            return true;
        }
    }


?>







?>