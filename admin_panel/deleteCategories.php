
<?php 
    require('connect.php');
    
    
    $c_id=$_GET['c_id'];

    $category_query = "SELECT * FROM categories WHERE c_id='$c_id'";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $CImages = $category_data['CImages'];

    $sql="DELETE FROM `categories` WHERE `c_id`='$c_id'";
    $result=mysqli_query($con,$sql);
    if ($result) 
    {
        if(file_exists("../uploads/category".$CImage))
        {
            unlink("../uploads/category".$CImage);
        }
        header("location: viewCategories.php");
    }else {
       
        header("location: viewCategories.php");
    }
?>




