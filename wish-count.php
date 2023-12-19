 
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
                $wishcount = mysqli_query($con, "SELECT * FROM `wishlist`,`product` WHERE `wishlist`.`p_id`=`product`.`p_id` AND u_id='$u_id'");
                
                $WC = mysqli_num_rows($wishcount);

                echo $WC;

 }else{
            echo "0";
 }
                                    

?>
   