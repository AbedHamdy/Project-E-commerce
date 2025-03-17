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

        static function numberOrders()
        {
            $con = DB::connect();
            $sql = "SELECT COUNT(*) as total FROM `orders`";
            $result = $con->query($sql);

            if($result)
            {
                $row = $result->fetch_assoc(); 
                return $row["total"];
            }

            return -1;
        }

        static function getData()
        {
            $con = DB::connect();
            $sql = "SELECT orders.* , products.name , orders_products.quantity FROM orders
                JOIN orders_products ON orders.id = orders_products.order_id
                JOIN products ON orders_products.product_id = products.id
                WHERE orders.status IN ('Processing', 'Shipped')
                ORDER BY orders.id DESC";
            $result = $con->query($sql);
            
            $data = [];

            if($result && $result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $data[] = $row;
                }
                return $data;
            }

            return -1;

        }

        static function changeStatus($status , $id)
        {
            $con = DB::connect();
            $sql = "UPDATE `orders` SET `status` = '$status' WHERE `id` = '$id'";
            $result = $con->query($sql);

            if($result)
            {
                return 1;
            }
            return -1;
        }

    }







?>