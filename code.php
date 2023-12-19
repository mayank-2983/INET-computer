<?php
include "connect.php";
session_start();

    if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

        if (isset($_POST['Rating'])) {
        $Review = $_POST['Review'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Rating = $_POST['star-rating'];
        $p_id = $_POST['p_id'];
        $user_id = "";
        if(isset($_COOKIE['u_id'])){
            $user_id = $_COOKIE['u_id'];
        }else{
            $user_id = $_SESSION['u_id'];
        }

        // $date = date('m/d/Y', time());
        $query = "INSERT INTO `productreview`(`Review`, `Name`, `Email`, `Rating`, `p_id`,`u_id`) VALUES ('$Review','$Name','$Email','$Rating','$p_id','$user_id')";
        $query_result = mysqli_query($con,$query);
        if ($query_result) {
            echo "
                            <script>
                                
                                window.location.href = 'product.php?p_id=$p_id';
                            </script>
                        ";
        }
        else
        {
            echo "
            
        ";
        }
        }
    }else{
        echo "
                <script>
                    
                    window.location.href = 'login.php';
                </script>
            ";
    }







?>