 
<?php 
include "connect.php";
session_start();
 if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

                                    $u_id = "";
                                    if(isset($_COOKIE['u_id'])){
                                        $u_id = $_COOKIE['u_id'];
                                    }else{
                                        $u_id = $_SESSION['u_id'];
                                    }
                                    $count = mysqli_query($con, "SELECT * FROM `carts`,`product` WHERE `carts`.`p_id`=`product`.`p_id` AND u_id='$u_id'");
                                    
                                    $c = mysqli_num_rows($count);



                                    echo "$c";

 }else{
            echo "0";
 }
                                    

?>