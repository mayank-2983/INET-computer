<?php 
    
    require('connect.php');
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    

    function sendEmail($EmailAddress,$verification_code)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        

        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'inetcomputer07@gmail.com';                     //SMTP username
            $mail->Password   = 'elzceasgeezbpthm';                               //SMTP password
            $mail->SMTPSecure = 'ssl';           //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('inetcomputer07@gmail.com', 'Inet Computer');
            $mail->addAddress($EmailAddress);     //Add a recipient
            

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification From Inet Computer';
            $mail->Body    = "Thanks for registration 
                click the link below to verify the email address 
                <a href='http://localhost/inet/inet/verify.php?email=$EmailAddress&&verification_code=$verification_code' class='btn btn-primary'> View Details</a>"; //

            $mail->send();
            return true; //Return
        } catch (Exception $e) {
            return false; //Return
        }
    }



    //for registration
    if (isset($_POST['Registration'])) 
    {
        

        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];  
        $EmailAddress = $_POST['EmailAddress'];
        $UserName = $_POST['UserName'];
        $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);

  
        $user_exists_query = "SELECT * FROM `user` WHERE `UserName` = '$UserName' OR `EmailAddress` = '$EmailAddress'";
        $result=mysqli_query($con,$user_exists_query);
        

        if ($result) 
        {
            if (mysqli_num_rows($result)>0) 
            {
                $result_fetch=mysqli_fetch_array($result);
                if($result_fetch['UserName']==$UserName) 
                {
                    echo "
                        <script>
                            alert('$result_fetch[UserName] - username already taken');
                            window.location.href = 'registration.php';
                        </script>
                    ";
                }
                else{
                    echo "
                        <script>
                            alert('$result_fetch[EmailAddress] - email already taken');
                            window.location.href = 'registration.php';
                        </script>
                    ";
                }
            }
            else
            {
                $verification_code = bin2hex(random_bytes(16));
                $query = "INSERT INTO `user`(`UserName`, `FirstName`, `LastName`,`EmailAddress`, `Password`,`verification_code`) VALUES ('$UserName', '$FirstName', '$LastName', '$EmailAddress', '$Password','$verification_code')";
                
                if(mysqli_query($con,$query) && sendEmail($EmailAddress,$verification_code))
                {
                    echo "
                        <script>
                            
                            window.location.href = 'login.php';
                        </script>
                    ";
                }
                else
                {
                    echo "
                        <script>
                            alert('Server Down');
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
                    
                    window.location.href = 'registration.php';
                </script>
            ";
        }
    }




    //for login
    if (isset($_POST['login'])){
        $EmailAddress = $_POST['EmailAddress'];
        $Password = $_POST['Password'];
        
        $query="SELECT * FROM `user` WHERE `EmailAddress`='$EmailAddress'";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);

                if($result_fetch["is_verified"] == 1)
                {
                    if (password_verify($Password,$result_fetch["password"])) 
                    {
                        //if password matched
                        $_SESSION['logged_in'] = true;
                        $_SESSION['u_id'] = $result_fetch['u_id'];
                        $_SESSION['UserName'] = $result_fetch['UserName'];
                        $_SESSION['EmailAddress'] = $result_fetch['EmailAddress'];
                        $remeber =  $_POST['check'];
                        if($remeber == "yes"){
                            setcookie("u_id",$result_fetch['u_id'],time()+(86400 * 30),'/');
                        }
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
                }else{
                    //if not password matched
                    echo "
                        <script>
                            alert('Please verify your email address');
                            window.location.href = 'login.php';
                        </script>
                    ";
                }

            }
            else
            {
                echo "
                <script>
                    alert('User can not exists');
                    window.location.href ='login.php';
                </script>
            ";
            }
        }
        else
        {
            echo "
                <script>
                    
                    window.location.href ='login.php';
                </script>
            ";
        }
    } 






    //for Update
    if (isset($_POST['update'])){
        $uid = $_POST['uid'];
        
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];  
        $EmailAddress = $_POST['EmailAddress'];
        $Password = $_POST['Password'];
        
        $query="SELECT * FROM `user` WHERE `u_id`='$uid'";
        $result=mysqli_query($con,$query);
        if($result){
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if (password_verify($Password,$result_fetch["password"])) 
                {
                    $update = "UPDATE `user` SET `FirstName`='$FirstName',`LastName`='$LastName',`EmailAddress`='$EmailAddress' WHERE `u_id` = '$uid'";
                    $result_update=mysqli_query($con,$update);
                    if($result_update)
                    {
                        echo "
                            <script>

                                window.location.href = 'settings.php';
                            </script>
                        ";
                    }
                    else
                    {
                        echo "
                            <script>

                                window.location.href = 'settings.php';
                            </script>
                        ";
                    }
                }   
                else{
                    //if not password matched
                echo "
                    <script>
                        alert('incorrect password');
                        window.location.href = 'settings.php';
                    </script>
                ";
                }

            }
        }

        
    }


    function resetPassword($EmailAddress)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        

        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'inetcomputer07@gmail.com';                     //SMTP username
            $mail->Password   = 'elzceasgeezbpthm';                               //SMTP password
            $mail->SMTPSecure = 'ssl';           //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('inetcomputer07@gmail.com', 'Inet Computer');
            $mail->addAddress($EmailAddress);     //Add a recipient
            

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset password From Inet Computer';
            $mail->Body    = "<P> Reset your password </p> <br>  
                <a href='http://localhost/inet/inet/reset_password.php?email=$EmailAddress' style='text-align: center; background-color: #1155ccbd; color: white; font-weight: 1000; padding: 11px 79px; font-size: 20px; text-decoration: none;' class='btn btn-primary'> Reset</a>"; //

            $mail->send();
            return true; //Return
        } catch (Exception $e) {
            return false; //Return
        } 
    }

    if(isset($_POST['forgot_pwd_mail'])){
        $EmailAddress = $_POST['EmailAddress'];

        $query="SELECT * FROM `user` WHERE `EmailAddress`='$EmailAddress'";
        $result=mysqli_query($con,$query);

        if($result)
        {
            if(mysqli_num_rows($result)==1){
                if(resetPassword($EmailAddress)){
                    echo "
                        <script>
                            alert('Email Sent We sent an email to ".$EmailAddress." .com with a link to get back into your account.');
                            window.location.href ='login.php';
                        </script>
                    ";
                }
            }
            else{
                echo "
                <script>
                    alert('User can not exists');
                    window.location.href ='forgot_password_email.php';
                </script>
            ";
            }
        }
    }



    if(isset($_POST['resetPwd'])){

        $password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $email = $_POST['email'];

        $update = "UPDATE `user` SET `Password`='$password' WHERE `EmailAddress`='$email'";
        $result_update=mysqli_query($con,$update);
        if($result_update)
        {
            echo "
                <script>
                     window.location.href = 'login.php';
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('User can not change password');
                    window.location.href = 'login.php';
                </script>
            ";
        }

    }
?> 