<?php 
session_start();

include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <!-- bootstap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- swiper  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <style>
     html{
        font-size: 62.5%;
    }
    main{
        margin-top: 50px;
    }
  </style>
  
</head>

<body>

<?php 

    if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
?>



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
                        <li>Cart</li>
                    </ul>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <main>
          
        <?php

            // include cart list 
            include("section/cart-list.php");

            // include cart list 
            include("section/latest-pro.php");
        
        
        
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

        <?php

    $trending1 = mysqli_query($con, "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' ");

    while ($data = mysqli_fetch_array($trending1)) {
    $i="";
    $res=$data['PImage'];
    $res=explode(",",$res);
    $count = count($res)-1;

    ?>

        <div class="modal fade" id="<?php echo "a" . $data['p_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Quick View</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="model-cont d-flex">
                            <div class="model-pro-img">
                            <div class="swiper mySwiper-modal">
                                    <div class="swiper-wrapper">
                                        <?php
                                        for ($i = 0; $i < $count; $i++) {
                                        ?>

                                            <div class="swiper-slide">
                                                <img src="<?php echo 'uploads/products/' . $res[$i]; ?>" alt="shoe image">
                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="model-pro-txt">
                                <h2><?php echo $data['Title'] ?> </h2>
                                <div class="rating">
                                    <?php
                                    $cpid = $data['p_id'];
                                    $review = mysqli_query($con,"SELECT * from productreview where  `p_id` = '$cpid' ");
                                    $c=0;
                                    $sum_str=0;
                                    if ($review) {
                                        while($r=mysqli_fetch_array($review)) {
                                            $c++;
                                            $sum_str+=$r['Rating'];

                                        }
                                        if (mysqli_num_rows($review)>0) 
                                        {
                                            $star=round($sum_str/$c);
                                            for($i=1;$i<=5;$i++){


                                                if($star<$i){
                                                    echo '<i class="bi bi-star"></i>';
                                                }else{
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                }
                                            }
                                        }else{
                                            echo "<p> ( There are no reviews yet. )</p>";
                                        }



                                    }



                                ?>
                                </div>
                                <h2 class="mt-3"><?php echo "₹ " . $data['SellPrice'] . ".00" ?></h2>
                                <div class="pro-discription">
                                    <?php echo $data['Discription'] ?>
                                </div>
                                <div class="model-categories text-secondary fw-bold mt-3">
                                    CATEGORIES: <strong class="text-dark ms-2"> <?php echo $data['CTitle'] ?></strong>
                                </div>
                                <div class="quantity-counter">
                                    <div class="quantity m-0">
                                        
                                        <a href="#" data-id="<?= 'a' . $data['p_id'] ?>" class="quantity__minus"><span>-</span></a>
                                        <input name="quantity" data-id="<?= 'a' . $data['p_id'] ?>" type="text" class="quantity__input" value="1">
                                        <a href="#" data-max="<?= $data['QTY'] ?>" data-id="<?= 'a' . $data['p_id'] ?>" class="quantity__plus"><span>+</span></a>

                                         
                                    </div>
                                    
                                </div>
                                <div class="model-cart py-3 ">
                                    <div class="model-cart-btn">
                                        
                                        <button class=" addTocartBtn" data-id="<?= 'a' . $data['p_id'] ?>" value="<?= $data['p_id'] ?>">
                                        <i class="bi bi-bag-heart"></i> Add to cart
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php

    }


}         

else
{
    header("Location: login.php");
}

?>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
  integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   
    
<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>

</html>