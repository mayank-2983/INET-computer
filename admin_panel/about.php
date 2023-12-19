<?php 
   require('connect.php');

    session_start(); 
    include 'myfuncations.php';

    //add categories
    if (isset($_POST['add-about']))
    {
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $col_rev = isset($_POST['column']) ? '1':'0';
        $Image = $_FILES['Image']['name'];

        $path = "../uploads/about/";

        

        $filename = time().'.'.$Image;

        $about_exist = "SELECT * FROM `about` WHERE `Title` = '$Title'";
        $result = mysqli_query($con,$about_exist);
        if ($result)
        {
            if (mysqli_num_rows($result)>0) 
            {
                $result_fetch = mysqli_fetch_array($result);
                if ($result_fetch['Title']==$Title) 
                {
                    
                    redirect("About content already exists","addAbout.php");
                }
            }
            else
            {
                $query = "INSERT INTO `about`(`Title`, `Discription`, `Image`, `Column_rev`) VALUES('$Title','$Discription','$filename','$col_rev')";
                $query_result = mysqli_query($con,$query);
                if ($query_result) 
                {
                    move_uploaded_file($_FILES['Image']['tmp_name'], $path.'/'.$filename);
                    
                    redirect("About Containt created successfully","addAbout.php");
                }
                else
                {
                    redirect("Something went wrong","addAbout.php");
                }
            }
            
        }
        else
        {
            redirect("can not run query","addAbout.php");
        }
    }


    if (isset($_POST['edit-about']))
    {
        $ab_id = $_POST['ab_id'];
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $col_rev = isset($_POST['column']) ? '1':'0';
        

        $old_image = $_POST['old_image'];

        if(file_exists("../uploads/about".$old_image))
        {
            unlink("../uploads/about".$old_image);
        }

        $Image = $_POST['Image']['name'];
        

         if($Image != "")
        {
            

            $filename = $Image;
        }
        else
        {
            $filename = $old_image;
        }

        $path = "../uploads/about";
        
        $update_query = "UPDATE `about` SET `Title`='$Title',`Discription`='$Discription',`Image`='$filename',`Column_rev`='$col_rev' WHERE `ab_id`='$ab_id '";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
            
                move_uploaded_file($_FILES['Image']['tmp_name'],$path.'/'.$filename );
                
        
            header("Location:viewAbout.php");
        }
        else
        {
            header("Location:viewAbout.php");
        }
    }
?>