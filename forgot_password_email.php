<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="./css/base.css">
    <title>Inet Conputer | Email </title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">



    <style>
        .error .error {
            color: red;
            margin-left: 5px;
        }

        .auth-one-bg-position {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 380px;
        }

        .auth-one-bg {
            background-position: center;
            background-size: cover;
            background-image: radial-gradient(rgba(0, 0, 0, 0) 0%, rgb(25 75 255 / 17%) 100%), radial-gradient(rgba(0, 0, 0, 0) 33%, rgb(9 87 255 / 47%) 166%);
        }

        #video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        #video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-one-bg .bg-overlay {
            background: linear-gradient(to right, rgb(99 41 255 / 6%), rgb(120 247 40 / 18%));
            opacity: 0.9;
        }

        .bg-overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            right: 0;
            bottom: 0;
            left: 0;
            top: 0;
            opacity: 0.7;
            background-color: #000;
        }

        .auth-one-bg .shape {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
        }

        .auth-one-bg .shape>svg {
            width: 100%;
            height: auto;
            fill: #ecf0fa;
        }

        .particles-js-canvas-el {
            position: relative;
        }

        .auth-page-wrapper .auth-page-content {
            padding-bottom: 60px;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .login-bg {
            background-color: rgb(255 255 255 / 50%);
            backdrop-filter: saturate(180%) blur(7px);
            border: 2px solid rgb(255 255 255 / 70%);
            box-shadow: rgb(0 0 0 / 10%) 0px 10px 15px -3px, rgb(0 0 0 / 5%) 0px 4px 6px -2px;
        }

        .card-body {
            box-shadow: rgb(0 0 0 / 45%) 0px 25px 20px -20px;
        }

        .form-label {
            font-size: 17px;
            font-family: calibri;
        }

        body {
            background: #ecf0fa !important;
        }
    </style>

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
        <div class="a-banner-caption">
            <div class="r row">
                <div class="col-sm-12 col c">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>LogIn</li>
                    </ul>
                    <h1>LogIn</h1>
                </div>
            </div>
        </div>

    </section>


    <!-- Settings -->

    <div class="auth-page-wrapper pt-5">

        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-5 login-bg">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <?php
                                    $sel_logo = mysqli_query($con, "SELECT * FROM `logo` limit 1");
                                    $log_arr = mysqli_fetch_array($sel_logo);
                                    ?>
                                    <div class="d-inline-block auth-logo">
                                        <img src="uploads/logo/<?= $log_arr['Image'] ?>" alt="Inet logo" height="120" />
                                    </div>
                                    <h3 class="text-dark mt-3">Enter Email</h3>
                                </div>

                                <form id="LoginForm" action="login_register.php" method="post" class="p-2 mt-3">

                                    <div class="instruction text-center">
                                        <p> Enter your email we'll send you a link to get back into your account. </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" required autocomplete="off" name="EmailAddress" id="EmailAddress" class="form-control" placeholder="Enter Email" />
                                        <span class="error" id="email-error"></span>
                                    </div>

                                    <div class="mt-4">
                                        <input type="submit" name="forgot_pwd_mail" value="Send" class="btn btn-primary w-100" />
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>




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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>


<!-- Isotop plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>