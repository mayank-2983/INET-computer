<?php 
    require('connect.php');

    $p_id = $_GET['p_id'];

    $product_query = "SELECT * FROM product WHERE p_id='$p_id'";
    $product_query_run = mysqli_query($con,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $PImage = $product_data['PImage'];

    $sql = "DELETE FROM product WHERE p_id='$p_id'";
    $result = mysqli_query($con,$sql);
    if ($result) 
    {
        if(file_exists("../uploads/products".$PImage))
        {
            unlink("../uploads/products".$PImage);
        }
        header("location: viewProduct.php");
    }else {
       
        header("location: viewProduct.php");
    }
?>