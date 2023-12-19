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
        main {
            margin-top: 99px;
        }

        .view-cont {
            background-color: #f4f4f4;
        }

        .bannerimg img {
            overflow: hidden;
            transition: all 1s ease-in-out;
        }

        .bannerimg {
            overflow: hidden;
        }

        .bannerimg:hover {
            overflow: hidden;
        }

        .bannerimg:hover img {
            transform: scale(1.05);
            transition: all 1s ease-in-out;
        }

        .bannerconntent {
            display: flex;
            justify-content: center;
            align-content: center;
            flex-direction: column;
        }

        .bannerconntent h3 {
            font-family: sans-serif;
            font-weight: 600;
            font-size: 25px;
        }

        .storyfooter .paracontent {
            max-width: 70%;
        }

        .storyfooter .names p {
            font-weight: 600;
            font-size: 20px;
        }
        .col-rev{
            flex-direction: row-reverse;
        }
        .col-nr{
            flex-direction: row;
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
                                    <li>About us</li>
                                </ul>
                                <h1>About</h1>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="view-cont py-5">
            <div class="container">
                
                
                   <h2 class="text-center fw-bold mb-5" >BEHIND THE SCENE</h2>
            
              <?php
                $select_about = mysqli_query($con, "SELECT * FROM `about`");

                while ($row = mysqli_fetch_array($select_about)) {
                    $cls="";
                    if($row['Column_rev']==1){
                        $cls="col-rev";
                    }else{
                        $cls="col-nr";
                    }
                ?>
                 
                    <div class="storydiv row mt-5   <?php echo $cls ?>">

                        <div class="bannerimg col-12 col-md-6 ">
                            <img src="<?php echo 'uploads/about/'.$row['Image']; ?>" alt="storyimg">
                        </div>
                        <div class="bannerconntent col-12 col-md-6    p-5">
                            <h3 class="text-center mb-4"><?php echo $row['Title'] ?></h3>
                            <?php echo $row['Discription'] ?>
                        </div>
                    </div>

                <?php

                }
                
                
                ?>
               
               </div>


                <div class="storyfooter text-center p-5">
                    <h4 class="fw-bold">MEET THE TEAM</h4>
                    <p class="paracontent mx-auto m-3">Cosmo lacus meleifend menean diverra loremous. Nullam sit amet orci rutrum risus
                        laoreet semper vel non magna.
                        Mauris vel sem a lectus vehicula ultricies. Etiam semper sollicitudin lectus indous scelerisque.</p>
                    <div class="names d-flex justify-content-evenly p-5">
                        <?php
                            $admin = mysqli_query($con,"SELECT * FROM admin ");

                            while ($ad = mysqli_fetch_array($admin)) {
                            ?>

                                <p><?php echo $ad['First_Name'].' '.$ad['Last_Name']; ?> </p>

                            <?php
                                
                            }

                        ?>
                        
                        

                    </div>
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