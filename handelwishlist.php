<?php 
session_start();
include "connect.php";

if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case 'Wsadd':
                $pro_id = $_POST['pro_id'];
                $user_id = "";
                if(isset($_COOKIE['u_id'])){
                    $user_id = $_COOKIE['u_id'];
                }else{
                    $user_id = $_SESSION['u_id'];
                }

                        $exists = "SELECT * FROM `wishlist` WHERE `p_id` = '$pro_id' AND `u_id` = '$user_id'";
                        $result = mysqli_query($con,$exists);

                        if (mysqli_num_rows($result) > 0) {
                            echo 440;
                        }
                        else {
                            

                            $insert_query = "INSERT INTO `wishlist`(`u_id`, `p_id`) VALUES ('$user_id','$pro_id')";
                            $run_insert_query = mysqli_query($con,$insert_query);

                            if ($run_insert_query) {
                                echo 201;
                            }else{
                                echo 500;
                            }
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