<?php 

    require_once("validate.php");
    class ValidateString extends Validate
    {
        private $word;
        public function __construct($word)
        {
            $this->word = $this->sanitizeInput($word);
        }

        public function checkWord()
        {
            if($this->requireVal($this->word))
            {
                return "The input is required";
            }
            else if($this->maxVal($this->word , 255))
            {
                return "The input is too long";
            }
            else if($this->minVal($this->word , 3))
            {
                return "The input is too short";
            }
            else if($this->word($this->word))
            {
                return "The input is not string";
            }
            return true;
        }
    }


?>