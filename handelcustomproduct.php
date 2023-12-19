<?php 
session_start();
include "connect.php";

if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case 'add':
                $pro_id = $_POST['pro_id'];
                $discound_price = $_POST['discound_price'];
                $user_id = "";
                if(isset($_COOKIE['u_id'])){
                    $user_id = $_COOKIE['u_id'];
                }else{
                    $user_id = $_SESSION['u_id'];
                }

                        

                            $insert_query = "INSERT INTO `custom_product`(`u_id`, `products_id`, `discount_price`) VALUES ('$user_id','$pro_id','$discound_price')";
                            $run_insert_query = mysqli_query($con,$insert_query);

                            if ($run_insert_query) {
                                echo 201;
                            }else{
                                echo 500;
                            }
                        
                        
                   
                

                

            
            break;

            default:
                echo 500;
                 
        }
    }
   
}else {
    echo 401;
}



?>