<?php 

    require_once __DIR__ . "/DB.php";

    class Review extends DB 
    {
        public $name;
        public $email;
        public $message;
        public $product_id;

        public function __construct($name, $email, $message, $product_id)
        {
            $this->name = $name;
            $this->email = $email;
            $this->message = $message;
            $this->product_id = $product_id;
        }

        public function setData() 
        {
            $con = $this->connect();
            $sql = "INSERT INTO `reviews` (`name`, `email`, `message`, `product_id`) VALUES ('$this->name', '$this->email', '$this->message', '$this->product_id')";
            $result = $con->query($sql);
            if($result)
            {
                return true;
            }
            return -1;
        }

        static function getAllReviews($product_id)
        {
            $con = DB::connect();
            $sql = 
                "SELECT reviews.name , reviews.created_at , reviews.message FROM `reviews` WHERE product_id = '$product_id'";

            $result = $con->query($sql);
            $data = [];

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }

                $sqlCount = "SELECT COUNT(*) AS total FROM `reviews` WHERE product_id = '$product_id'";
                $resultCount = $con->query($sqlCount);
                $count = $resultCount->fetch_assoc()['total'];

                return 
                [
                    "reviews" => $data,
                    "count" => $count
                ];
            }

            return -1;
        }
    }







?>