<?php 

    require_once __DIR__ . "/DB.php";

    class OrderProduct 
    {
        public $order_id;
        public $product_id;
        public $quantity;
        public $price;

        public function __construct($order_id , $product_id , $quantity , $price)
        {
            $this->order_id = $order_id;
            $this->product_id = $product_id;
            $this->quantity = $quantity;
            $this->price = $price;
        }

        public function setData()
        {
            $con = DB::connect();

            $sql = 
                "INSERT INTO `orders_products` (`order_id` , `product_id` , `quantity`, `price`)
                VALUES ('$this->order_id' , '$this->product_id' , '$this->quantity' , '$this->price')";
            $result = $con->query($sql);
            if($result)
            {
                return true;
            }
            return -1;
        }
    }













?>