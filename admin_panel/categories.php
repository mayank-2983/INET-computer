<?php 
    require('connect.php');

    session_start(); 
    include 'myfuncations.php';
    //add categories
    if (isset($_POST['add_categories']))
    {
        $CTitle = $_POST['CTitle'];
        $CDiscription = $_POST['CDiscription'];
        $CStatus = $_POST['CStatus'];
        $CPopular = isset($_POST['CPopular']) ? '1':'0';

        $CImage = $_FILES['CImage']['name'];

        $path = "../uploads/category";



       $filename = time().$CImage;

        $categories_exists = "SELECT * FROM `categories` WHERE `CTitle` = '$CTitle'";
        $result = mysqli_query($con,$categories_exists);
        if ($result)
        {
            if (mysqli_num_rows($result)>0) 
            {
                $result_fetch = mysqli_fetch_array($result);
                if ($result_fetch['CTitle']==$CTitle) 
                {
                    
                    redirect("Category already exists","addcategories.php");
                }
            }
            else
            {
                $query = "INSERT INTO `categories`(`CTitle`,`CDiscription`,`CImage`,`CStatus`,`CPopular`) VALUES('$CTitle','$CDiscription','$filename','$CStatus','$CPopular')";
                $query_result = mysqli_query($con,$query);
                if ($query_result) 
                {
                    move_uploaded_file($_FILES['CImage']['tmp_name'], $path.'/'.$filename);
                    
                    redirect("Category created successfully","addcategories.php");
                }
                else
                {
                    redirect("Something went wrong","addcategories.php");
                }
            }
            
        }
        else
        {
            redirect("can not run query","addcategories.php");
        }
    }
    



    //edit categories
    if (isset($_POST['edit_categories']))
    {
        $c_id = $_POST['c_id'];
        $CTitle = $_POST['CTitle'];
        $CDiscription = $_POST['CDiscription'];
        $CStatus = $_POST['CStatus'];
        $CPopular = isset($_POST['CPopular']) ? '1':'0';
        $old_image = $_POST['old_image'];

        
        if(file_exists("../uploads/category".$old_image))
        {
            unlink("../uploads/category".$old_image);
        }

        $CImage = $_FILES['CImage']['name'];
        
        
        $path = "../uploads/category";


        if($CImage != "")
        {
            

            $filename = time().'.'.$CImage;
        }
        else
        {
            $filename = $old_image;
        }

        $update_query = "UPDATE `categories` SET `CTitle`='$CTitle',`CDiscription`='$CDiscription',`CImage`='$filename',`CStatus`='$CStatus',`CPopular`='$CPopular' WHERE `c_id`='$c_id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
           
                move_uploaded_file($_FILES['CImage']['tmp_name'],$path.'/'.$filename);
               
            header("Location:viewCategories.php");
            
        }
        else
        {
            header("Location:editCategories.php");
            
        }
    }

    
?>