<?php 
    require('connect.php');
    
    include ("myfuncations.php");
    $blog_id=$_GET['blog_id'];

    $blog_query = "SELECT * FROM blog WHERE blog_id='$blog_id'";
    $blog_query_run = mysqli_query($con,$blog_query);
    $blog_data = mysqli_fetch_array($blog_query_run);
    $Images = $blog_data['Images'];

    $sql="DELETE FROM `blog` WHERE `blog_id`='$blog_id'";
    $result=mysqli_query($con,$sql);
    if ($result) 
    {
        if(file_exists("../uploads/blog".$Image))
        {
            unlink("../uploads/blog".$Image);
        }
        header("location: viewBlog.php");
    }else {
       
        header("location: viewBlog.php");
    }
?>
