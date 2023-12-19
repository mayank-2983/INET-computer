<?php 
    require('connect.php');

    if (isset($_POST['login'])) {
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        if(empty($_POST['Email']) || empty($_POST['Password'])) {
            echo "
                    <script>
                        alert('Email and/or Password can not be empty');
                        
                    </script>
                ";
        }else{
            $query = "SELECT * FROM `admin` WHERE `Email`='$Email'";
            $result = mysqli_query($con,$query);
            if($result) 
            {
                if(mysqli_num_rows($result)==1)
                {
                    
                    $result_fetch=mysqli_fetch_array($result);
                    if(password_verify($Password,$result_fetch["Password"]))
                    {
                        session_start();
                        $_SESSION['admin_login'] = true;
                        $_SESSION['admin'] = $result_fetch['id'];
                        header("Location:index.php");
                       
                    }
                    else
                    {
                        //if not password matched
                        echo "
                            <script>
                                alert('incorrect password');
                                window.location.href = 'login.php';
                            </script>
                        ";
                    }
                }
                else
                {
                     echo "
                 <script>
                     alert('Please enter correct Email or Password');
                     window.location.href ='index.php';
                 </script>
             ";
                }
            }
        }
    }


    if(isset($_POST['all_page_banner'])){
        $old_image = $_POST['old_image'];
        $Image = $_FILES['Image']['name'];
        $id = $_POST['id'];
        
        if($Image != "")
        {
            $filename = time().'.'.$Image;
        }
        else
        {
            $filename = $old_image;
        }

        $path = "../uploads/all_page_banner/";

        $update_query = "UPDATE `all_page_banner` SET `Image`='$filename' WHERE `id` = '$id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
           
                move_uploaded_file($_FILES['Image']['tmp_name'],$path.'/'.$filename );

            
            header("Location:config.php");
        }
        else
        {
            // header("Location:config.php");
        }
    }

    if(isset($_POST['logo_img'])){
        $old_image = $_POST['old_image'];
        $logo_img = $_FILES['logo_img']['name'];
        $id = $_POST['id'];
        
        if($logo_img != "")
        {
            $filename = time().'.'.$logo_img;
        }
        else
        {
            $filename = $old_image;
        }

        $path = "../uploads/logo/";

        $update_query = "UPDATE `logo` SET `Image`='$filename' WHERE `id` = '$id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
           
                move_uploaded_file($_FILES['logo_img']['tmp_name'],$path.'/'.$filename );

            
            header("Location:config.php");
        }
        else
        {
            header("Location:config.php");
        }
    }

    if(isset($_POST['Store_Details'])){
        $store_phone = $_POST['store_phone'];
        $store_email = $_POST['store_email'];
        $store_address = $_POST['store_address'];
        $store_Location = $_POST['store_Location'];
        $id = $_POST['id'];
        $update_query = "UPDATE `store_detail` SET `mobile_no`='$store_phone',`Email`='$store_email',`Address`='$store_address',`location`='$store_Location' WHERE `id` = '$id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run)
        {
           
            

            
            header("Location:config.php");
        }
        else
        {
            header("Location:config.php");
        }
    }
?>