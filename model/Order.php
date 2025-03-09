<?php 

    require_once __DIR__ . "/DB.php";
    
    class Order 
    {
        public $user_id;	
        public $total_price;	
        public $first_name;	
        public $last_name;	
        public $country;	
        public $street_address;	
        public $city;	
        public $phone;	
        public $notes;	
        public $email;	

        public function __construct($user_id , $total_price , $first_name , $last_name , $country , $street_address , $city , $phone , $notes , $email)
        {
            $this->user_id = $user_id;
            $this->total_price = $total_price;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->country = $country;
            $this->street_address = $street_address;
            $this->city = $city;
            $this->phone = $phone;
            $this->notes = $notes;
            $this->$email = $email;
        }

        public function setData()
        {
            $con = DB::connect();
            $sql = 
                "INSERT INTO `orders` (`user_id` , `total_price` , `first_name` , `last_name` , `country` , `street_address` , `city` , `phone` , `notes` , `email`)
                VALUES ('$this->user_id' , '$this->total_price' , '$this->first_name' , '$this->last_name' , '$this->country' , '$this->street_address' , '$this->city' , '$this->phone' , '$this->notes' , '$this->email')";
            $result = $con->query($sql);
            if($result)
            {
                $order_id = $con->insert_id;
                return $order_id;
            }
            return -1;
        }

    }







?>