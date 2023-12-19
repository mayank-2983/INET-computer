<?php 
session_start(); 

    if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){

    require('connect.php');
      

    $u_id = "";
    if(isset($_COOKIE['u_id'])){
        $u_id = $_COOKIE['u_id'];
    }else{
        $u_id = $_SESSION['u_id'];
    }
    $sql = "select * from `user` where u_id='$u_id'";
    $result=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $uid = $row['u_id'];
    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $EmailAddress = $row['EmailAddress'];
    $UserName = $row['UserName'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/base.css">
    <title>Inet Conputer</title>

    <!-- Site favicon -->
    <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="img/favicon/apple-touch-icon.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="img/favicon/favicon-32x32.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="img/favicon/favicon-16x16.png"
  />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
</head>
<body>
    
        <header>
            <?php
            //   include headers 
               include("header1.php");
            ?>
        </header>
        <section class="all-page-title a-banner">
             <?php
                    $apl = mysqli_query($con, "SELECT * FROM `all_page_banner` LIMIT 1");
                    $img = mysqli_fetch_array($apl);
                ?>

                    <img height="100px" src="./uploads/all_page_banner/<?= $img['Image'] ?>" alt="">
            <div class="a-banner-caption" >
                <div class="r row">
                    <div class="col-sm-12 col c">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>settings</li>
                        </ul>
                        <h1>settings</h1>
                    </div>
                </div>
            </div>
        </section>


        <!-- Settings -->
        <section class="account">
            <div class="row fadeInUp r">
                <div class="col-md-3 productbar">
                    <?php 
                        //include sidebar
                        include("acc-sidebar.php");
                    ?>
                </div>

                <div class="col-md-9">
                    <!-- Update User Information -->
                    <form action="login_register.php" method="post">
                        <div class="row">
                            <div class="col-sm-12 m-30">
                                <h4>Personal Info</h4>
                                
                                <input type="hidden" value="<?php echo $uid; ?>" name="uid" id="uid" />

                                <label for="FirstName">First Name</label>
                                <input type="text" value="<?php echo $FirstName; ?>" name="FirstName" id="FirstName" required/>
                                <label for="LastName">Last Name</label>
                                <input type="text" value="<?php echo $LastName; ?>" name="LastName" id="LastName" required/>
                                <label for="EmailAddress">Email Address</label>
                                <input type="email" value="<?php echo $EmailAddress; ?>" name="EmailAddress" id="EmailAddress" required/>
                                
                            </div>

                           

                            
                               

                           
                            <!-- //.columns.large-6 -->
                            <div class="col-lg-6 end">
                                <h4>Username and Password</h4>
                            <label for="UserName">Username</label>
                            <input type="text" name="UserName" id="UserName" value="<?php echo $UserName; ?>" readonly />
                          
                            <label for="Password">Password</label>
                            <input type="password" name="Password" id="Password"  />
                            
                            
                                
                                <button type="submit" name="update" class="button">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


        </section>
        <footer>
            <?php
            //  include footer 
            include("footer.php")
            ?>
        </footer>
        <div class="copy-rights">
            <p>
                © 2023 inetCom. Powered by Inet Computer.</p>
        </div>



  
</body>
<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- jquery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Isotop plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</html>

<?php 
    }else {
        header("location: index.php");
    }
?>