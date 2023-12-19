<?php
require('connect.php');
session_start();

$b_id = $_GET['blog_id'];
$qry = mysqli_query($con,"SELECT * from blog where `blog_id`= $b_id");

$blog = mysqli_fetch_array($qry);
 
?>
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
        .blog-cont{
            /* height: 80vh; */
          
            margin-top: 52px;
            margin-bottom: 30px;
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
                            <li>Blog Detail</li>
                        </ul>
                        <h1>Blog Detail</h1>
                    </div>
                </div>
            </div>
        </div>
        <main>
            

            <?php
            if($blog){
                ?> 
                <div class="blog-cont">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-img">
                            <img class="img-fluid d-block m-auto" src="<?php echo 'uploads/blog/'.$blog['Image']; ?>" alt="blog-img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="blog-txt h-100" style="text-align: justify;">
                        <?php echo $blog['Discription']; ?>
                        </div>
                    </div>
                </div>
             </div>
            </div>
                <?php
            }else{
                echo "Something Went Wrong!";
            }
            
            ?>

        </main>
        <footer>
            <?php
            //  include footer 
            include("footer.php")
            ?>
        </footer>
        <div class="copy-rights">
            <p>
                © 2023 inetCom. Powered by Sattu.</p>
        </div>
    </div>

     
 


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