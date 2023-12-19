<?php 
session_start();
include "connect.php";

if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case 'add':
                $pro_id = $_POST['pro_id'];
                $pro_qty = $_POST['pro_qty'];
                
                    $user_id = "";
                    if(isset($_COOKIE['u_id'])){
                        $user_id = $_COOKIE['u_id'];
                    }else{
                        $user_id = $_SESSION['u_id'];
                    }

                        $exists = "SELECT * FROM `carts` WHERE `p_id` = '$pro_id' AND `u_id` = '$user_id'";
                        $result = mysqli_query($con,$exists);

                        if (mysqli_num_rows($result) > 0) {
                            
                            $select_query = mysqli_query($con,"SELECT * FROM `carts` WHERE `p_id` = '$pro_id' AND `u_id` = '$user_id'");
                            $row = mysqli_fetch_array($select_query);
                            $new_qty = $pro_qty + $row['cart_qty'];
                            
                            $update_query = "UPDATE `carts` SET `cart_qty`='$new_qty' WHERE `p_id`='$pro_id' AND `u_id`='$user_id'"; 
                            $run_update_query = mysqli_query($con,$update_query);       
                            if ($run_update_query) {
                                echo 201;
                            }else{
                                echo 500;
                            }
                        }
                        else
                        {
                            $insert_query = "INSERT INTO `carts`(`u_id`, `p_id`, `cart_qty`) VALUES ('$user_id','$pro_id','$pro_qty')";
                            $run_insert_query = mysqli_query($con,$insert_query);
    
                            if ($run_insert_query) {
                                echo 201;
                            }else{
                                echo 500;
                            }
                        }
                        
                   
                

                

            
            break;

            case 'update':
                $pro_id = $_POST['pro_id'];
                $pro_qty = $_POST['pro_qty'];
                $user_id = "";
                if(isset($_COOKIE['u_id'])){
                    $user_id = $_COOKIE['u_id'];
                }else{
                    $user_id = $_SESSION['u_id'];
                }
                

                
                
                $upd_qur = "UPDATE carts SET cart_qty='$pro_qty' WHERE p_id='$pro_id' AND u_id='$user_id' ";
                $upd_qry_run = mysqli_query($con,$upd_qur);

                if ($upd_qry_run) {
                    header("location: checkout.php");
                }
                else {
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