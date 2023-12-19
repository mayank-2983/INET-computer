<section class="pro-page-tabs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pro-page-tabs-container">
                    <div class="tab-links">
                        <a href="#description" data-tab="description" class="b-nav-tab active">
                            Description
                        </a>
                        <a href="#Shipping" data-tab="Shipping" class="b-nav-tab">
                            Shipping & Return
                        </a>
                        <a href="#review" data-tab="review" class="b-nav-tab">
                            review
                        </a>
                    </div>
                    <div class="tab-contents">
                        <div id="description" class="b-tab active">
                            <?= $product['Discription'] ?>
                        </div>
                        <div id="Shipping" class="b-tab">
                            <div class="paragraph">
                                <h4>Returns Policy</h4>
                                <p>You may return most new, unopened items within 7 days of delivery for a full
                                    refund. We'll also pay the return shipping costs if the return is a result
                                    of our error (you received an incorrect or defective item, etc.).</p>
                                <p>You should expect to receive your refund within four weeks of giving your
                                    package to the return shipper, however, in many cases you will receive a
                                    refund more quickly. This time period includes the transit time for us to
                                    receive your return from the shipper (5 to 10 business days), the time it
                                    takes us to process your return once we receive it (3 to 5 business days),
                                    and the time it takes your bank to process our refund request (5 to 10
                                    business days).</p>
                                <p>If you need to return an item, simply login to your account, view the order
                                    using the "Complete Orders" link under the My Account menu and click the
                                    Return Item(s) button. We'll notify you via e-mail of your refund once we've
                                    received and processed the returned item.</p>
                            </div>
                            <div class="paragraph">
                                <h4>Shipping</h4>
                                <p>We can ship to virtually any address in the world. Note that there are
                                    restrictions on some products, and some products cannot be shipped to
                                    international destinations.</p>
                                <p>When you place an order, we will estimate shipping and delivery dates for you
                                    based on the availability of your items and the shipping options you choose.
                                    Depending on the shipping provider you choose, shipping date estimates may
                                    appear on the shipping quotes page.</p>
                                <p>Please also note that the shipping rates for many items we sell are
                                    weight-based. The weight of any such item can be found on its detail page.
                                    To reflect the policies of the shipping companies we use, all weights will
                                    be rounded up to the next full pound.</p>
                            </div>
                        </div>
                        <div id="review" class="b-tab">
                            <div class="no-riview">
                                <h4>Reviews</h4>



                                <div class="row">
                                    <div class="col-12">
                                        <div class="swiper mySwiperRevP">
                                            <div class="swiper-wrapper mb-5">
                                                <?php
                                                $review2 = mysqli_query($con, "SELECT * FROM `productreview` WHERE `p_id`='$cpid' ORDER BY `productreview`.`review_date` DESC limit 10");
                                                if (mysqli_num_rows($review2) > 0) {




                                                    while ($rev = mysqli_fetch_array($review2)) {
                                                ?>
                                                        <div class="swiper-slide">
                                                            <div class="product-rev-cont">
                                                                
                                                                <div class="rev-name">
                                                                    <h5><?= $rev['Name'] ?></h5>

                                                                </div>
                                                                <div class="star-rate mb-2">

                                                                    <?php

                                                                    $star = $rev['Rating'];
                                                                    for ($i = 1; $i <= 5; $i++) {


                                                                        if ($star < $i) {
                                                                            echo '<i class="bi bi-star"></i>';
                                                                        } else {
                                                                            echo '<i class="bi bi-star-fill"></i>';
                                                                        }
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <div class="riew-dic">
                                                                    <p class="m-0"><?= $rev['Review'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                    echo "<p>There are no reviews yet.</p>";
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 p-5" style="background-color:#f4f4f4 ;">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Your Rating</label>
                                                <div class="star-widget">
                                                    <div method="" name="feedback" class="star-rev" action="#" onsubmit="feedBack(); return false">
                                                        <input type="radio" name="star" id="rate-5" value="5" onclick="postToController()">
                                                        <label for="rate-5" class="fa-solid fa-star"></label>
                                                        <input type="radio" name="star" id="rate-4" value="4" onclick="postToController()">
                                                        <label for="rate-4" class="fa-solid fa-star"></label>
                                                        <input type="radio" name="star" id="rate-3" value="3" onclick="postToController()">
                                                        <label for="rate-3" class="fa-solid fa-star"></label>
                                                        <input type="radio" name="star" id="rate-2" value="2" onclick="postToController()">
                                                        <label for="rate-2" class="fa-solid fa-star"></label>
                                                        <input type="radio" name="star" id="rate-1" value="1" onclick="postToController()">
                                                        <label for="rate-1" class="fa-solid fa-star"></label>
                                                        <p id="error-rating"></p>
                                                        <!-- <p class="rating-desc"></p>           -->
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="p_id" value="<?= $product['p_id'] ?>">
                                            <input type="hidden" class="rating-star" value="0" name="star-rating">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Your Review</label>
                                                <textarea class="form-control ratingmessage" name="Review" rows="3"></textarea>
                                                <b><span class="spanreview text-danger"></span></b>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Name</label>
                                                <input type="text" class="form-control yourname" name="Name" aria-describedby="emailHelp">
                                                <b><span class="spanname text-danger"></span></b>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control email" name="Email" aria-describedby="emailHelp">
                                                <b><span class="spanemail text-danger"></span></b>

                                            </div>

                                            <button class="btn btn-dark" type="submit" name="Rating" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                $user_id = "";
                                if (isset($_COOKIE['u_id'])) {
                                    $user_id = $_COOKIE['u_id'];
                                } else {
                                    $user_id = $_SESSION['u_id'];
                                }

                                $review3 = mysqli_query($con, "SELECT * FROM `productreview` WHERE `p_id`='$cpid' AND  `u_id`='$user_id'");
                                if (mysqli_num_rows($review3) > 0) {
                                ?>
                                    <h4>Your Reviews</h4>



                                    <div class="row">
                                        <div class="col-12">
                                            <div class="swiper mySwiperRevP">
                                                <div class="swiper-wrapper mb-5">
                                                    <?php





                                                    while ($rev = mysqli_fetch_array($review3)) {
                                                    ?>
                                                        <div class="swiper-slide">
                                                            <div class="product-rev-cont">
                                                                <div class="del-icon-rev">
                                                                    
                                                                    <a  href="delreview.php?r_id=<?= $rev['r_id'] ?>&&p_id=<?= $cpid ?>" ><i class="bi bi-trash text-danger"></i></a>
                                                                </div>
                                                                <div class="rev-name">
                                                                    <h5><?= $rev['Name'] ?></h5>

                                                                </div>
                                                                <div class="star-rate mb-2">

                                                                    <?php

                                                                    $star = $rev['Rating'];
                                                                    for ($i = 1; $i <= 5; $i++) {


                                                                        if ($star < $i) {
                                                                            echo '<i class="bi bi-star"></i>';
                                                                        } else {
                                                                            echo '<i class="bi bi-star-fill"></i>';
                                                                        }
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <div class="riew-dic">
                                                                    <p class="m-0"><?= $rev['Review'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                }
                                                ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function postToController() {
        for (i = 0; i < document.getElementsByName('star').length; i++) {
            if (document.getElementsByName('star')[i].checked == true) {
                var ratingValue = document.getElementsByName('star')[i].value;
                break;
            }
        }
        $(".rating-star").val(ratingValue);

    }
</script>