<?php 
    require('connect.php');
    session_start();   
    
   if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inet Conputer Acount</title>

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
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">

    <style>
        table tr td{
            vertical-align: middle;
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
            <div class="a-banner-caption" >
                <div class="r row">
                    <div class="col-sm-12 col c">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Account</li>
                        </ul>
                        <h1>My ORDER</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Account -->
        <section class="account">
            <div class="row fadeInUp r">
                <div class="col-md-3 productbar">
                    <?php
                        include "acc-sidebar.php";
                    ?>
                </div>
                <div class="col-md-9 history">
                    <h3>Purchase</h3>
                    <table class="table">
                        <thead class="">
                            <tr>
                                 <th>Id</th>
                                 <th>Tracking No</th>
                                 <th>Price</th>
                                 <th>Date</th>
                                 <th>View</th>
                                  
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            $u_id = "";
                            if(isset($_COOKIE['u_id'])){
                                $u_id = $_COOKIE['u_id'];
                            }else{
                                $u_id = $_SESSION['u_id'];
                            }

                            $query = "SELECT * FROM `orders` WHERE `u_id` = '$u_id'  ORDER BY `orders`.`created_at` DESC";
                            $orders = mysqli_query($con,$query);

                            if(mysqli_num_rows($orders) > 0){
                                foreach ($orders as $item) {
                            ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['tracking_no'] ?></td>
                                    <td><?= $item['total_price'].".00" ?></td>
                                    <td><?= $item['created_at'] ?></td>
                                    <td>
                                       <!-- <a href="" class="btn btn-primary"> View Details</a> -->
                                       <a href="view_order.php?t=<?= $item['tracking_no'] ?>" class="ord-btn btn bg-primary text-light">View Details</a>
                                    </td>
                                    
                                </tr>
                            <?php
                                }
                            }
                            else
                            {
                        ?>  
                                <tr>
                                    <td>NO Order Yet</td>
                                </tr>
                        <?php

                            }
                        ?>
                        
                            
                            
                        </tbody>
                    </table>
                    
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
    }else{
        header("location: index.php");
    }
?>