<?php 

require('connect.php');

if(isset($_GET['email']) && isset($_GET['verification_code'])){

    $query = "SELECT * FROM user WHERE EmailAddress = '$_GET[email]' AND verification_code = '$_GET[verification_code]'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        if(mysqli_num_rows($query_run) == 1){
            $result_fetch = mysqli_fetch_assoc($query_run);

            if($result_fetch['is_verified'] == 0){
                $update = "UPDATE `user` SET `is_verified`='1' WHERE EmailAddress = '$_GET[email]' AND verification_code = '$_GET[verification_code]'";
                $update_run = mysqli_query($con,$update);
                if($update_run)
                {
                    echo "
                        <script>
                            alert('Email Verification Successfully');
                            window.location.href = 'login.php';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Server Down');
                             window.location.href = 'index.php';
                        </script>
                    ";
                }
            }else{
                echo "
                    <script>
                        alert('Email already verifed');
                        window.location.href = 'login.php';
                    </script>
                ";
            }
        }
    }else{
        echo "
                <script>
                    alert('Server Down');
                    
                </script>
            ";
    }
}
?>