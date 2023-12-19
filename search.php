<?php
require('connect.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inet Computer</title>
    <link rel="stylesheet" href="./css/base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        .filter-list{
            margin-top: 20px;
        }
        .list-container{
            padding: 0 10px;
        }
     
        .data-list{
            display: flex;
            justify-content: space-between;
            padding: 2px 0;
        }
        .data-list:hover{
            cursor: pointer;
        }
        .data-title p{
            color: gray;
        }
        .data-list .data-counter p{
            padding: 3px 13px;
            border-radius: 14px;
        }
        .data-list:hover .data-counter p{
            background-color: #3b3ba6;
            color: white;
        
        }
        .data-list:hover .data-title p{
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
        .list-group-item:focus, .list-group-item:hover {
            z-index: 0;
        }
        .list-group-item .filter_all{
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
                                <li>Search</li>
                            </ul>
                            <h1>Search</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-cont">
                <?php
                $t_p_q = mysqli_query($con, "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' ");
                $t_p = mysqli_num_rows($t_p_q);
                ?>
                <div class="container">
                    <form action="" class="position-relative">
                        <i class="bi bi-search"></i>
                            

                            <input type="text"  id="searchInput" autocomplete="off"  placeholder="Search from <?= $t_p ?> products">
                            
                            
                            
                    </form>

                    <div class="products mt-5">
                        <div class="row justify-content-end mb-4">
                            <div class="col-6 col-md-4">
                                <div class="medium-4 product-short d-flex gap-1 align-items-center">
                                    <label for="sort-pro">Short By :</label>
                                    

                                        <select id="filterSelect" class="filter_all form-control w-50" onchange="filter_data()">
                                            <option value="">Sort By</option>
                                            <option value="tranding">Best Selling</option>
                                            <option value="asc">Alphabetically, A-Z</option>
                                            <option value="desc">Alphabetically, Z-A</option>
                                            <option value="LtoH">Price, low to high</option>
                                            <option value="HtoL">Price, high to low</option>
                                            <option value="new_to_old">Date, new to old</option>
                                            <option value="olg_to_new">Date, old to new</option>
                                        </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="filter-product">
                                            <div class="filter-head">
                                                <h5>FILTER</h5>
                                            </div>
                                            
                                            
                                            <div class="filter-list">
                                                <div class="fil-title">
                                                    <h6>Categories</h6>
                                                    <hr>
                                                </div>
                                                <div class="list-group">

                                                <?php
                                                    $categories = mysqli_query($con, "SELECT DISTINCT CTitle,c_id FROM `categories` WHERE `CStatus` = 'Active'");
                                                    while($data = mysqli_fetch_array($categories)) {
                                                        $cid = $data['c_id'] ;
                                                    
                                                        $no_of_product = mysqli_query($con," SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`c_id`=$cid and product.Status = 'active'");
                                                        $s=0;
                                                        while($d = mysqli_fetch_array($no_of_product)) 
                                                        {
                                                            $s+=1;
                                                        }
                                                        
                                                        if($s > 0){

                                                        
                                                ?>
                                                    <div class="list-group-item checkbox">
                                                        
                                                            <label>
                                                                <input type="checkbox" class="filter_all category" value="<?php echo $data['c_id']; ?>">
                                                                <?php echo $data['CTitle']; ?>
                                                            </label>
                                                        
                                                    </div>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="filter-list">
                                                <div class="fil-title">
                                                    <h6>Brands</h6>
                                                    <hr>
                                                </div>
                                                <div class="list-group">
                                                <?php
                                                    $categories = mysqli_query($con, "SELECT DISTINCT BTitle,b_id FROM `brand` WHERE `BStatus` = 'Active'");
                                                    while($row = mysqli_fetch_array($categories)) {
                                                        $bid = $row['b_id'] ;
                                                    
                                                        $no_of_product = mysqli_query($con," SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`b_id`=$bid and product.Status = 'active'");
                                                        $b=0;
                                                        while($d = mysqli_fetch_array($no_of_product)) 
                                                        {
                                                            $b+=1;
                                                        }
                                                        
                                                        if($b > 0){

                                                        
                                                ?>
                                                    <div class="list-group-item checkbox">
                                                        
                                                            <label>
                                                                <input type="checkbox" class="filter_all brand" value="<?php echo $row['b_id']; ?>">
                                                                <?php echo $row['BTitle']; ?>
                                                            </label>
                                                        
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
                            <div class="col-12 col-md-9 filter_data" id="product-data" >


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
                                <?php
                            if ($data['QTY'] <= 0) {
                            ?>
                                <div class="put-stock">
                                    <img class="img-fluid" src="./img/stock/out_of_stock.png" alt="out of stco">
                                </div>
                            <?php
                            } else {
                            ?>

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
                            <?php

                            }
                            ?>
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

<script type="text/javascript">
    $(document).ready(function () {
        filter_data();


        function filter_data(){
            $('.filter_data');
            
            var search_term = $("#searchInput").val();
            
            var action = 'fetch_data';
            var category = get_filter('category');
            var brand = get_filter('brand');
            var filter= document.getElementById("filterSelect").value;
            
            // alert(search_term);
            
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    action: action,
                    category: category,
                    brand: brand,
                    filter: filter,
                    search:search_term
                },
                success: function (data){
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

        
        $("#searchInput").on("keyup",function(){
            
            
            var search_term = $("#searchInput").val();
            
            var action = 'fetch_data';
            var category = get_filter('category');
            var brand = get_filter('brand');
            var filter= document.getElementById("filterSelect").value;
            
            // alert(search_term);
            
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    action: action,
                    category: category,
                    brand: brand,
                    filter: filter,
                    search:search_term
                },
                success: function (data){
                    $('.filter_data').html(data);
                }
            });
        });


        //Pagination Code
        $(document).on("click","#pagination a",function(e) {
          e.preventDefault();
          var page_id = $(this).attr("id");
    
          loadTable(page_id);
        })
    });
</script>

</html>