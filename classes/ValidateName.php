<?php 

    require_once("validate.php");
    class ValidateName extends Validate
    {
        private $name;
        public function __construct($name)
        {
            $this->name = $this->sanitizeInput($name);
        }

        public function checkName()
        {
            if($this->requireVal($this->name))
            {
                return "Name is required";
            }
            else if($this->maxVal($this->name , 255))
            {
                return "Name is too long";
            }
            else if($this->minVal($this->name , 3))
            {
                return "Name is too short";
            }
            return true;
        }
    }


?>