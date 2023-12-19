<?php
    require('connect.php');

    session_start();
    include 'myfuncations.php';

    //add policy
    if(isset($_POST['add_policy'])){
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Status = $_POST['Status'];
        $policy_exists = "SELECT * FROM `policy` WHERE `Title` = '$Title'";
        $result = mysqli_query($con,$policy_exists);
        if($result)
        {
            if(mysqli_num_rows($result) > 0){

                $result_fetch = mysqli_fetch_array($result);
                if ($result_fetch['Title']==$Title) 
                {

                    redirect("POlicy already exists","addPolicy.php");
                }
            }
            else
            {
                $result_insert = "INSERT INTO `policy` (`Title`, `Discription`, `Status`) VALUES ('$Title', '$Discription', '$Status')";
                $query_result = mysqli_query($con,$result_insert);
                if($query_result)
                {
                    redirect("Policy added","addPolicy.php");
                }
                else
                {
                    // redirect("Something went wrong","addPolicy.php");
                }
            }
        }
        else
        {
            redirect("can not run query","addPolicy.php");
        }
    }

    //edit policy
    if(isset($_POST['edit_policy'])){
        $id = $_POST['id'];
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Status = $_POST['Status'];

        $update_query = "UPDATE `policy` SET `Title`='$Title', `Discription`='$Discription', `Status`='$Status' WHERE `id`='$id'";
        $result = mysqli_query($con,$update_query);
        if($result)
        {
             header("Location:viewPolicy.php");
        }
        else
        {
            header("Location:viewPolicy.php");
        }
    }        


?>