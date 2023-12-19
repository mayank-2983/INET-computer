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
        body {}

     

        .pro-discription {
            font-size: 13px;
            color: gray;
            height: 231px !important;
            overflow-y: scroll !important;
            margin: 20px 0 !important;
        }
        .blogs-cont{
            min-height: 80vh;
            margin-top: 100px;
            margin-bottom: 0px;
        }
        .blog-item{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

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
                                    <li>Blog</li>
                                </ul>
                                <h1>Blog</h1>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="blogs-cont">
            <div class="container">
                <h1 class="mb-5">Blogs</h1>
                <div class="row gx-4 gy-5">
                <?php 
                    $select_blog = mysqli_query($con, "SELECT * FROM `blog` WHERE `Status` = 'active' ORDER BY `created_at` DESC limit 3");
                    while ($row = mysqli_fetch_array($select_blog)) {
                        $created_at =  $row['created_at'];
                        $date = date('Y-m-d',strtotime($created_at));
                        $month = date('M', strtotime($date));
                        $day = date('d', strtotime($date));
                        $b_id = $row['blog_id'];
                ?>
                    
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img class="img-fluid" src="<?php echo 'uploads/blog/'.$row['Image']; ?>" alt="">
                            </div>
                            <div class="date">
                                <h4 class="text-center"><?= $day ?><br><?php echo $month;   ?></h4>
                            </div>
                            <div class="blog-txt">
                                <h3><?php echo $row['Title'] ?></h3>
                                <div class="blog-link">
                                <a href="blog-details.php?blog_id=<?= $b_id ?>"> <i class="bi bi-arrow-right"></i> Read More</a>
                                                    
                                </div>
                            </div>
                        </div>
                    </div>
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