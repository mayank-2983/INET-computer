<?php 
    require('connect.php');

    session_start(); 
    include 'myfuncations.php';
    //add categories
    if (isset($_POST['add_Brand']))
    {
        $BTitle = $_POST['BTitle'];
        $BDiscription = $_POST['BDiscription'];
        $BStatus = $_POST['BStatus'];
        $BImage = $_FILES['BImage']['name'];

        $path = "../uploads/brands/";

        // $image_ext = pathinfo($BImage, PATHINFO_EXTENSION);

        $filename = time().'.'.$BImage;

        $brand_exists = "SELECT * FROM `brand` WHERE `BTitle` = '$BTitle'";
        $result = mysqli_query($con,$brand_exists);
        if ($result)
        {
            if (mysqli_num_rows($result)>0) 
            {
                $result_fetch = mysqli_fetch_array($result);
                if ($result_fetch['BTitle']==$BTitle) 
                {
                    
                    redirect("Brand already exists","addcategories.php");
                }
            }
            else
            {
                $query = "INSERT INTO `brand`(`BTitle`, `BDiscription`, `BImage`, `BStatus`) VALUES('$BTitle','$BDiscription','$filename','$BStatus')";
                $query_result = mysqli_query($con,$query);
                if ($query_result) 
                {
                    move_uploaded_file($_FILES['BImage']['tmp_name'], $path.'/'.$filename);
                    
                    redirect("Brand created successfully","addBrand.php");
                }
                else
                {
                    redirect("Something went wrong","addBrand.php");
                }
            }
            
        }
        else
        {
            redirect("can not run query","addBrand.php");
        }
    }

    if (isset($_POST['edit_brand']))
    {
        $b_id = $_POST['b_id'];
        $BTitle = $_POST['BTitle'];
        $BDiscription = $_POST['BDiscription'];
        $BStatus = $_POST['BStatus'];

        $old_image = $_POST['old_image'];
        
        if(file_exists("../uploads/brands".$old_image))
        {
            unlink("../uploads/brands".$old_image);
        }

        $BImage = $_FILES['BImage']['name'];
        
        if($BImage != "")
        {
            

            $filename = time().'.'.$BImage;
        }
        else
        {
            $filename = $old_image;
        }

        $path = "../uploads/brands/";

        $update_query = "UPDATE `brand` SET `BTitle`='$BTitle',`BDiscription`='$BDiscription',`BImage`='$filename',`BStatus`='$BStatus' WHERE `b_id`='$b_id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
           
                move_uploaded_file($_FILES['BImage']['tmp_name'],$path.'/'.$filename );

            
            header("Location:viewBrand.php");
        }
        else
        {
            header("Location:editBrand.php");
        }
    }



?>