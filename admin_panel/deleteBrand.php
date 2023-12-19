<?php 
    require('connect.php');
    
    include ("myfuncations.php");
    $b_id=$_GET['b_id'];

    $brand_query = "SELECT * FROM brand WHERE b_id='$b_id'";
    $brand_query_run = mysqli_query($con,$brand_query);
    $brand_data = mysqli_fetch_array($brand_query_run);
    $BImages = $brand_data['BImages'];

    $sql="DELETE FROM `brand` WHERE `b_id`='$b_id'";
    $result=mysqli_query($con,$sql);
    if ($result) 
    {
        if(file_exists("../uploads/brands".$CImage))
        {
            unlink("../uploads/brands".$CImage);
        }
        header("location: viewBrand.php");
    }else {
       
        header("location: viewBrand.php");
    }
?>
