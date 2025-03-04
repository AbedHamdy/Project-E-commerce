<?php 


    require_once __DIR__ . "/DB.php";

    class Customer
    {
        public $email;
        public $password;

        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }

        public function checkAccount()
        {
            $con = DB::connect();
            $sql = "SELECT * FROM `users` WHERE `email` = '$this->email' AND `password` = '$this->password'";
            $result = $con->query($sql);
            
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row;
            }
            return NULL;
        }
    }









?>