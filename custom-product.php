<?php
require('connect.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inet Conputer | custom product</title>

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    <!-- swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <style>
        .search-cont {
            min-height: 83vh;
            margin-top: 40px;
        }

        .search-cont form input {

            border: 1px solid black;
            width: 100%;
            padding: 12px 10px 12px 50px;

            border-radius: 26px;

        }

        .search-cont form input:focus {
            box-shadow: 0 0 0 calc(1em * 1 / 16) #f0f1f3, 0 0 0 calc(calc(1em * 3 / 16) + calc(1em * 1 / 16)) #74c0fc;
        }

        .search-cont form i {
            position: absolute;
            z-index: 1;
            font-size: 20px;
            top: 10px;
            left: 16px;

        }

        .filter-head h5 {
            color: #fff;
            font-size: 20px;
            padding: 14px 15px;
            margin-bottom: 30px;
            text-align: center;
            background: #00008bc4;
        }

        .filter-list {
            margin-top: 20px;
        }

        .list-container {
            padding: 0 10px;
        }

        .data-list {
            display: flex;
            justify-content: space-between;
            padding: 2px 0;
        }

        .data-list:hover {
            cursor: pointer;
        }

        .data-title p {
            color: gray;
        }

        .data-list .data-counter p {
            padding: 3px 13px;
            border-radius: 14px;
        }

        .data-list:hover .data-counter p {
            background-color: #3b3ba6;
            color: white;

        }

        .data-list:hover .data-title p {
            color: #3b3ba6;
        }

        .list-group {

            border: 1px solid #f3f3f3;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }

        .list-group h3 {
            font-size: 22px;
        }

        .list-group-item {
            color: gray;
            border: none;
            margin-left: -10px;
            margin-bottom: -8px;
            font-size: 16px;
        }

        .list-group-item:focus,
        .list-group-item:hover {
            z-index: 0;
        }

        .list-group-item .filter_all {
            margin-right: 10px;
        }

        /* SideBar */
        #price_range {
            height: 6px;
        }

        .ui-slider-handle {
            height: 13px !important;
            width: 13px !important;
            background: #0b0d1e !important;
            border-radius: 25px;
        }

        .ui-slider-range.ui-corner-all.ui-widget-header {
            background: #5a45ff;
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
                                <li>Custom Product</li>
                            </ul>
                            <h1>Custom Product</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-cont">

                <div class="container">


                    <div class="products mt-5">
                        <div class="row">
                            <div class=" col-lg-4 col-xl-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="filter-product">
                                            <div class="filter-head">
                                                <h5>Categories</h5>
                                            </div>


                                            <div class="filter-list">
                                                
                                                <div class="list-group">

                                                    <?php
                                                    $categories = mysqli_query($con, "SELECT DISTINCT CTitle,c_id FROM `categories` WHERE `CStatus` = 'Active'");

                                                        $c=0;
                                                    while ($data = mysqli_fetch_array($categories)) {
                                                        $cid = $data['c_id'];
                                                        $c++;
                                                        $no_of_product = mysqli_query($con, " SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`c_id`=$cid and product.Status = 'active'");
                                                        $s = 0;
                                                        while ($d = mysqli_fetch_array($no_of_product)) {
                                                            $s += 1;
                                                        }

                                                        if ($s > 0) {


                                                    ?>
                                                            <div class="list-group-item checkbox">

                                                                <div class="accordion" id="accordionExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="c<?=$data['c_id']?>">
                                                                            <button class="accordion-button <?php if ($c == 1){
                                                                                echo "";
                                                                            }else {
                                                                                echo "collapsed";
                                                                            } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$data['c_id']?>" aria-expanded="<?php if ($c == 1){
                                                                                echo "true";
                                                                            }else {
                                                                                echo "false";
                                                                            } ?>" aria-controls="collapse<?=$data['c_id']?>">
                                                                                <?php echo $data['CTitle']; ?>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="collapse<?=$data['c_id']?>" class="accordion-collapse collapse <?php if ($c == 1){
                                                                                echo "show";
                                                                            }else {
                                                                                echo "";
                                                                            } ?>" aria-labelledby="c<?=$data['c_id']?>" data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body">
                                                                                <?php
                                                                                        $product = mysqli_query($con, " SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`c_id`=$cid and product.Status = 'active'");
                                                                                        while($product_data = mysqli_fetch_array($product))
                                                                                        {
                                                                                            ?>
                                                                                        <label>

                                                                                            <input type="radio" class=" form-check-input filter_all product" name="<?php echo $data['CTitle']; ?>"  value="<?php echo $product_data['p_id']; ?>">
                                                                                            <?php echo $product_data['Title']; ?>
                                                                                        </label>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9 filter_data" id="product-data">


                            </div>
                        </div>
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

    <?php

    $trending1 = mysqli_query($con, "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' ");

    while ($data = mysqli_fetch_array($trending1)) {
        $i = "";
        $res = $data['PImage'];
        $res = explode(",", $res);
        $count = count($res) - 1;

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
                                    $review = mysqli_query($con, "SELECT * from productreview where  `p_id` = '$cpid' ");
                                    $c = 0;
                                    $sum_str = 0;
                                    if ($review) {
                                        while ($r = mysqli_fetch_array($review)) {
                                            $c++;
                                            $sum_str += $r['Rating'];
                                        }
                                        if (mysqli_num_rows($review) > 0) {
                                            $star = round($sum_str / $c);
                                            for ($i = 1; $i <= 5; $i++) {


                                                if ($star < $i) {
                                                    echo '<i class="bi bi-star"></i>';
                                                } else {
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                }
                                            }
                                        } else {
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
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php

    }
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

<script type="text/javascript">
    $(document).ready(function() {
        filter_data();


        function filter_data() {
            $('.filter_data');

            
            var action = 'fetch_data';
            var product = get_filter('product');
            
            

            

            $.ajax({
                url: "fetch_custom.php",
                method: "POST",
                data: {
                    action: action,
                    product: product
                },
                success: function(data) {
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.filter_all').click(function() {
            filter_data();
        });


       


        
    });
</script>

</html>