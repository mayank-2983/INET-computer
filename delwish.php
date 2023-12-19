<?php
    session_start();
    include "connect.php";
    $w_id = $_GET['w_id'];
    
    if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
    $u_id = "";
    if(isset($_COOKIE['u_id'])){
        $u_id = $_COOKIE['u_id'];
    }else{
        $u_id = $_SESSION['u_id'];
    }

    $del_query = mysqli_query($con,"DELETE FROM `wishlist` WHERE `w_id`='$w_id' AND `u_id`='$u_id' ");
    if($del_query){
        header("Location:whishlist.php");
    }
    }


?>