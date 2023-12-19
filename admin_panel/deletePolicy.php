<?php 
    require('connect.php');

    $id = $_GET['id'];



    $sql = "DELETE FROM `policy` WHERE id='$id'";
    $result = mysqli_query($con,$sql);
    if ($result) 
    {
        
        header("location: viewPolicy.php");
    }else {
       
        header("location: viewPolicy.php");
    }
?>