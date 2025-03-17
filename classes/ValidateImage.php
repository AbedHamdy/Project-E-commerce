<?php 

    require_once("validate.php");

    class ValidateImage extends Validate
    {
        static function saveImage($image , $storagePlace)
        {
            if(isset($image) && $_FILES["image"]["error"] == 0)
            {
                $imageTmpPath = $_FILES["image"]["tmp_name"];
                $imageName = $_FILES["image"]["name"];
                $imageType = $_FILES["image"]["type"];

                $acceptType = ['image/jpeg', 'image/png', 'image/gif'];

                if(in_array($imageType , $acceptType))
                {

                    if(!is_dir(filename: $storagePlace))
                    {   
                        mkdir($storagePlace , 0777 , true);
                    }

                    $imagePath = $storagePlace . basename($imageName);

                    if(move_uploaded_file($imageTmpPath , $imagePath))
                    {
                        return $imageName;
                    }
                }
            }
            
            return -1;
        }
    }













?>