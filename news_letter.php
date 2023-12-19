<?php  
include "connect.php";   
    if (isset($_POST['news_letter']))
    {
        $email = $_POST['email'];

        $exist_query = mysqli_query($con, "SELECT * FROM `news_letter` WHERE `email`='$email'");
        if ($exist_query)
        {   
            if (mysqli_num_rows($exist_query)>0) 
            {
                echo "
                        <script>
                            alert('already subscribed');
                            window.location.href = 'index.php';
                        </script>
                    ";
            }else{
                $query = mysqli_query($con,"INSERT INTO `news_letter`(`email`) VALUES ('$email')");
                if($query){
                    echo "
                        <script>
                            alert('subscribed');
                            window.location.href = 'index.php';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Server error');
                            window.location.href = 'index.php';
                        </script>
                    ";
                }
            }
        }
        else
        {
            echo "
                <script>
                    window.location.href = 'index.php';
                </script>
            ";
        }
    }
?>