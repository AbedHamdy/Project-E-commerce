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

            $emailCheckSql = "SELECT id FROM `users` WHERE `email` = '$this->email'";
            $result = $con->query($emailCheckSql);
        
            if ($result->num_rows > 0) 
            {
                return "0";
            }
            
            $sql = "INSERT INTO `users` (`name`, `email` , `password`) VALUES ('$this->name', '$this->email', '$this->password')";
            
            if($con->query($sql) === true)
            {
                $query = "SELECT LAST_INSERT_ID() AS last_id";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
                // var_dump($row["last_id"]);
                // die;
                return $row["last_id"];
            }
            return -1;
        }

        static function numberUsers()
        {
            $con = DB::connect();
            $sql = "SELECT COUNT(*) as total FROM `users` WHERE `status` = 'user'";
            $result = $con->query($sql);

            if($result)
            {
                $row = $result->fetch_assoc(); 
                return $row["total"];
            }

            return -1;
        }
    }













?>