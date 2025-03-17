<?php 

    require_once("validate.php");
    class ValidateId extends Validate
    {
        private $id;
        public function __construct($id)
        {
            $this->id = $this->sanitizeInput($id);
        }

        public function checkId()
        {
            if($this->numeric($this->id))
            {
                return "id must be numeric";
            }
            return true;
        }
    }


?>