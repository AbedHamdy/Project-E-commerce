<?php 

    // require_once "../env.php";
    require_once __DIR__ . "/DB.php";

    class User 
    {
        public $name;
        public $email;
        public $password;

        public function __construct($name, $email, $password)
        {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        public function setData()
        {
            $con = DB::connect();
            $sql = "INSERT INTO `users` (`name`, `email` , `password`) VALUES ('$this->name', '$this->email', '$this->password')";
            $con->query($sql);
        }
    }













?>