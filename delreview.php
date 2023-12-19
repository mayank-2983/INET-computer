<?php
    session_start();
    include "connect.php";
    $r_id = $_GET['r_id'];
    $p_id = $_GET['p_id'];

    if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
    $u_id = "";
    if(isset($_COOKIE['u_id'])){
        $u_id = $_COOKIE['u_id'];
    }else{
        $u_id = $_SESSION['u_id'];
    }

    $del_query = mysqli_query($con,"DELETE FROM `productreview` WHERE `r_id`='$r_id' AND `u_id`='$u_id' AND `p_id`='$p_id' ");
    if($del_query){
        header("Location:product.php?p_id=$p_id");
    }
    }


?>