<?php 
    require('connect.php');
    
    include ("myfuncations.php");
    $ab_id=$_GET['ab_id'];

    $about_query = "SELECT * FROM about WHERE ab_id='$ab_id'";
    $about_query_run = mysqli_query($con,$about_query);
    $about_data = mysqli_fetch_array($about_query_run);
    $Images = $about_data['Images'];

    $sql="DELETE FROM `about` WHERE `ab_id`='$ab_id'";
    $result=mysqli_query($con,$sql);
    if ($result) 
    {
        if(file_exists("../uploads/about".$Image))
        {
            unlink("../uploads/about".$Image);
        }
        header("location: viewAbout.php");
    }else {
       
        header("location: viewAbout.php");
    }
?>
