<?php
require('connect.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="./css/base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <style>
        .contact-wraper{
            margin-top: 70px;
        }
        form .form-control{
        padding: 12px 15px;
        border-radius: 0 !important;
        box-shadow: none !important;
        margin-top: 10px;
    }
    button[type=submit]{
        border-radius: none ;
        border: none;
        padding: 14px 30px;
        background-color: #0a235a;
        font-weight: 600;
        color: white;
    }
    button[type=submit]:hover{
        border: 1px solid  #0a235a;
        color:  #0a235a;
        background-color: white;
        transition: 0.5s ease-in;
    }
    @media only screen and (max-width:992px) {
        .row .details{
            padding-left: 10px !important;
            padding-top: 0 !important;
        }
        
    }

        

    </style>

</head>

<body>
    <section class="live-chat">
        <div class="chat-cont">
            <img src="img/live-chat1.png" alt="">
        </div>
    </section>
    <div class="main-content">
        <header>
            <?php
            //   include headers 
            include("header1.php");
            ?>
        </header>
        <main>
        <div class="all-page-title a-banner">
                     <?php
                    $apl = mysqli_query($con, "SELECT * FROM `all_page_banner` LIMIT 1");
                    $img = mysqli_fetch_array($apl);
                ?>

                    <img height="100px" src="./uploads/all_page_banner/<?= $img['Image'] ?>" alt="">
                    <div class="a-banner-caption">
                        <div class="r row">
                            <div class="col-sm-12 col c">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Contact </li>
                                </ul>
                                <h1>Contact</h1>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                $cont_qry=mysqli_query($con,"SELECT * FROM store_detail");
                $cont_arr =mysqli_fetch_array($cont_qry);
                
                ?>

        <div class="contact-wraper">
        <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h3>Contact Us</h3>
                <p>Have a question or comment? </p>
                <p>Use the form below to send us a message or contact us by mail at:</p>
                <form>
                    <div class="mb-3 mt-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="pno">Phone Number</label>
                        <input type="text" class="form-control" id="pno">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <label for="comment">Comment <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="8" id="comment"></textarea>
                    <button type="submit" class="mt-4">SUBMIT CONTACT</button>
                </form>
            </div>
            <div class="col-lg-6 details mt-4"style="padding:150px 0 0 150px;">
                <h5 class="mb-4">Get In Touch!</h5>
                <p class="mb-4">In need of assistance? Want to know more about your order's status or give us some suggestions for
                    improvement? Let us know how we can help you further. We welcome your feedback and comments.</p>
                <div class="d-flex">
                    <span class="icon">
                        <svg style="position: relative; top: 0px; width: 20px;height: 20px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comment-alt-dots" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-comment-alt-dots fa-w-16 fa-7x"><path fill="currentColor" d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 9.8 11.2 15.5 19.1 9.7L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zM128 240c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z" class=""></path></svg>
                        </span> 
                    <a href="tel:+91<?= $cont_arr['mobile_no'] ?>" class="ms-2">TEXT: +91 <?= $cont_arr['mobile_no'] ?></a>
                </div>
                <div class="d-flex">
                    <span class="icon">
                        <svg style="width: 20px;height: 20px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-7x"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" class=""></path></svg></span>
                    <a href="mailto:<?= $cont_arr['Email'] ?>" class="ms-2"><?= $cont_arr['Email'] ?></a>
                </div>
                <p class="mt-3"> <?= $cont_arr['Address'] ?></p>
                <hr>
                <p class="mb-3">Opening Hours:</p>
                <p class="mb-3">MON to SAT: 9:00AM - 10:00PM</p>
                <p>SUN: 10:00AM - 6:00PM</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-3">
    <?= $cont_arr['location'] ?>
    </div>
        </div>
             
        </main>
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
    </div>

    <!-- email-popup -->
    <?php
    // include("section/email-popup.php")
    ?>




</body>

<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- jquery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Isotop plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</html>