<?php 
   require('connect.php');

    session_start(); 
    include 'myfuncations.php';

    //add categories
    if (isset($_POST['add-blog']))
    {
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Status = $_POST['Status'];
        $Image = $_FILES['Image']['name'];

        $path = "../uploads/blog/";


        $filename = time().'.'.$Image;

        $blog_exists = "SELECT * FROM `blog` WHERE `Title` = '$Title'";
        $result = mysqli_query($con,$blog_exists);
        if ($result)
        {
            if (mysqli_num_rows($result)>0) 
            {
                $result_fetch = mysqli_fetch_array($result);
                if ($result_fetch['Title']==$Title) 
                {
                    
                    redirect("Blog already exists","addBlog.php");
                }
            }
            else
            {
                $query = "INSERT INTO `blog`(`Title`, `Discription`, `Image`, `Status`) VALUES('$Title','$Discription','$filename','$Status')";
                $query_result = mysqli_query($con,$query);
                if ($query_result) 
                {
                    move_uploaded_file($_FILES['Image']['tmp_name'], $path.'/'.$filename);
                    
                    redirect("Blog created successfully","addBlog.php");
                }
                else
                {
                    redirect("Something went wrong","addBlog.php");
                }
            }
            
        }
        else
        {
            redirect("can not run query","addBlog.php");
        }
    }


    if (isset($_POST['edit-blog']))
    {
        $blog_id = $_POST['blog_id'];
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Status = $_POST['Status'];
        

        $old_image = $_POST['old_image'];

        if(file_exists("../uploads/blog".$old_image))
        {
            unlink("../uploads/blog".$old_image);
        }

        $Image = $_POST['Image']['name'];
        

         if($Image != "")
        {
            

            $filename = time().'.'.$Image;
        }
        else
        {
            $filename = $old_image;
        }

        $path = "../uploads/blog";
        
        $update_query = "UPDATE `blog` SET `Title`='$Title',`Discription`='$Discription',`Image`='$filename',`Status`='$Status' WHERE `blog_id`='$blog_id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
            
                move_uploaded_file($_FILES['Image']['tmp_name'],$path.'/'.$filename );
                
        
            header("Location:viewBlog.php");
        }
        else
        {
            header("Location:viewBlog.php");
        }
    }
?>