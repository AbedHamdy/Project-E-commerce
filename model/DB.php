<?php 

    class DB 
    {
        private static $con;

        // private function __construct($host, $user, $password, $database)
        // {
        //     DB::$con = new mysqli($host, $user, $password, $database);
        // }

        static function connect()
        {
            if(!DB::$con)
            {
                DB::$con = new mysqli(host, user, password, database);
                if(DB::$con->connect_error)
                {
                    die("connection failed: " . DB::$con->connect_error);
                }
            }
            return DB::$con;
        }
    }













?>