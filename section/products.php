<?php

$cpid = $_GET['p_id'];


$qry = mysqli_query($con, "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`p_id`=$cpid");
// $qry = mysqli_query($con,"SELECT * FROM `product`, where `p_id`=$cpid");

$product = mysqli_fetch_array($qry);
$c_id = $product['c_id'];
$i = "";
$res = $product['PImage'];
$res = explode(",", $res);
$count = count($res) - 1;
if ($product) {
?>
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="pro-page-img-cont">

                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperpropage2">
                            <div class="swiper-wrapper">

                                <?php
                                for ($i = 0; $i < $count; $i++) {
                                ?>
                                    <div class="swiper-slide">
                                        <img class="magnifiedImg" src="uploads/products/<?= $res[$i] ?>" />
                                    </div>
                                <?php
                                }

                                ?>




                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiperpropage mt-2">
                            <div class="swiper-wrapper">

                                <?php
                                for ($i = 0; $i < $count; $i++) {
                                ?>
                                    <div class="swiper-slide">
                                        <img class="magnifiedImg mini-img" src="uploads/products/<?= $res[$i] ?>" />
                                    </div>
                                <?php
                                }

                                ?>





                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="pro-page-txt">
                        <h2><?= $product['Title'] ?></h2>


                        <div class="pro-page-rivewrate">
                            <?php
                            $review = mysqli_query($con, "SELECT * from productreview where  `p_id` = '$cpid' ");
                            $c = 0;
                            $sum_str = 0;
                            $star = 0;
                            if ($review) {
                                if (mysqli_num_rows($review) > 0) {
                                    while ($row = mysqli_fetch_array($review)) {
                                        $c++;
                                        $sum_str += $row['Rating'];
                                    }
                                    $star = round($sum_str / $c);
                                } else {
                                    // echo "<p> ( There are no reviews yet. )</p>";
                                }
                            }

                            ?>
                            <div class="d-flex gap-2 gap-md-5">
                                <div class="star-rate">

                                    <?php

                                    for ($i = 1; $i <= 5; $i++) {


                                        if ($star < $i) {
                                            echo '<i class="bi bi-star"></i>';
                                        } else {
                                            echo '<i class="bi bi-star-fill"></i>';
                                        }
                                    }

                                    ?>

                                    <!-- <i class="bi bi-star-fill"></i> -->

                                </div>
                                <div class="rivew-status">
                                    <?php
                                    if (mysqli_num_rows($review) > 0) {
                                        echo "<p>  $c Ratings </p>";
                                    } else {
                                        echo "<p> ( There are no reviews yet. )</p>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>


                        <div class="pro-page-price">
                        <?php
                         
                            if ($product['Discount'] == 0) {
                             } else{
                            ?>
                            <h3> <del> &#8377; <?= $product['Price'] ?></h3>
                            <?php
                            } ?>
                            <h3> &#8377;<?= $product['SellPrice'] ?></h3>
                        </div>

                        <div class="pro-page-discription">
                            <p>
                                <?= $product['Discription'] ?>
                            </p>
                        </div>



                        <div class="pro-page-categories">
                       
                            <p><strong>Categpries: </strong> <?= $product['CTitle'] ?></p>
                        
                            <p><strong>Brand: </strong> <?= $product['BTitle'] ?></p>
                        </div>


                        <!-- <div class="pro-page-varients">

                            <strong>Color:</strong>
                            <div class="colo-var">
                                <div class="red"></div>
                                <div class="green"></div>
                                <div class="yellow"></div>
                                <div class="black"></div>
                            </div>

                        </div> -->

                        <!-- <div class="pro-page-varients">
                            <strong>Size:</strong>
                            <div class="size-var">
                                <div>sm</div>
                                <div>md</div>
                                <div>xl</div>

                            </div>
                        </div> -->

                        <?php
                        if ($product['QTY'] <= 0) {
                            ?>
                            <div class="put-stock">
                                <img class="img-fluid" src="./img/stock/out_of_stock.png" alt="out of stco">
                            </div>
                            <?php
                        } else {
                        ?>
                            <div class="mt-2 mt-xl-5">
                                <div class="quantity">
                                    <a href="#" data-id="pro" class="quantity__minus"><span>-</span></a>
                                    <input data-id="pro" disabled name="quantity" type="text" class="quantity__input" value="1">
                                    <a href="#" data-id="pro" data-max="<?= $product['QTY'] ?>" class="quantity__plus"><span>+</span></a>


                                </div>

                                <div class="pro-page-cart-btn">
                                    <button class="crt-btn addTocartBtn" data-id="pro" value="<?= $product['p_id'] ?>">
                                        Add to Cart
                                    </button>
                                    <div class="like-icn">
                                        <div class="addWhishList" data-id="<?= $product['p_id'] ?>">
                                            <i class="bi bi-bag-heart"></i>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="pro-page-buy-btn">
                                    <a href="checkout.php?pid=<?= $cpid ?>&qty=1" class="buy-btn">
                                        Buy it now
                                    </a>
                                </div> -->
                            </div>
                        <?php
                        }

                        ?>




                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
} else {
    echo "Something went wrong";
}
?>
<script>
    var qty = $(".quantity__input").val();
    var path = `checkout.php?pid=<?= $cpid ?>&qty=${qty}`;
    $(".buy-btn").attr('href', path);
</script>