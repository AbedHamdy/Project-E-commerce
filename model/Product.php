<?php 

    require_once __DIR__ . "/DB.php";
    class Product 
    {
        public $name;	
        public $price;	
        public $discount;	
        public $description;	
        public $advantages;	
        public $image;
        public $category_id;

        public function __construct($name, $price, $discount, $description, $advantages, $image, $category_id)
        {
            $this->name = $name;
            $this->price = $price;
            $this->discount = $discount;
            $this->description = $description;
            $this->advantages = $advantages;
            $this->image = $image;
            $this->category_id = $category_id;
        }

        public function setData() 
        {
            $con = DB::connect();
            $sql = "INSERT INTO `products` (`name`, `price`, `discount`, `description`, `advantages`, `image`, `category_id`) VALUES ('$this->name', '$this->price', '$this->discount', '$this->description', '$this->advantages', '$this->image', '$this->category_id')";
            $result = $con->query($sql);
            if($result)
            {
                return true;
            }
            return -1;
        }

        static function productDetails($input)
        {
            $con = DB::connect();
            $sql = 
                "SELECT products.* , categories.name as category_name FROM `products` 
                INNER JOIN `categories` ON products.category_id = categories.id 
                WHERE products.id = '$input'";
            $result = $con->query($sql);
            $data = [];

            if($result->num_rows > 0)
            {
                $data = $result->fetch_assoc();
                return $data;
            }

            return -1;
        }

        static function dataHome()
        {
            $con = DB::connect();
            $sql = "SELECT id, name, image, price, discount FROM products ORDER BY id ASC LIMIT 3";
            $result = $con->query($sql);
            $data = [];

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                return $data;
            }

            return -1;
        }

        static function limitProduct($input)
        {
            $con = DB::connect();
            $sql = "SELECT * FROM `products` ORDER BY RAND() LIMIT $input";
            $result = $con->query($sql);
            $data = [];

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                return $data;
            }

            return -1;
        }

        static function numberProducts()
        {
            $con = DB::connect();
            $sql = "SELECT COUNT(*) as total FROM `products`";
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