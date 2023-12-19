<?php

include "connect.php";

session_start();
if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
    $user_id = "";
    if(isset($_COOKIE['u_id'])){
        $user_id = $_COOKIE['u_id'];
    }else{
        $user_id = $_SESSION['u_id'];
    }

    $pid = $_GET['p_id'];


    $sql = "SELECT * FROM `custom_product` WHERE u_id = '$user_id' AND products_id = '$pid'";
    $result = mysqli_query($con, $sql);

    $product = mysqli_fetch_array($result);
    $i = "";
    $res = $product['products_id'];
    $res = explode(",", $res);
    $count = count($res) - 1;

    for ($i = 0; $i < $count; $i++) {
        $product_fetch = mysqli_query($con, "SELECT * FROM `product` WHERE p_id = $res[$i] ");
        $fetch_data = mysqli_fetch_array($product_fetch);

        echo $fetch_data['Title'];
    }
}

?>