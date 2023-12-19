<section class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-head mb-5">
                    <h3>Shopping Cart</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
        <div class="col-12 col-lg-9">


            <?php

            $user_id = "";
            if (isset($_COOKIE['u_id'])) {
                $user_id = $_COOKIE['u_id'];
            } else {
                $user_id = $_SESSION['u_id'];
            }
            $view_cart = mysqli_query($con, "SELECT * from user, carts, product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.p_id = carts.p_id AND  carts.u_id = user.u_id AND carts.u_id='$user_id' ");

            $sum = 0;
            $c = 0;


            if (mysqli_num_rows($view_cart) == 0) {
            ?>





                <div class="no-cart-item">
                    <img class="d-block m-auto" src="img/stock/nocart.png" alt="">
                </div>
               
                <?php
            } else {




                while ($cart = mysqli_fetch_array($view_cart)) {
                    $res = $cart['PImage'];
                    $res = explode(",", $res);

                ?>
                
                        <div class="cart-list">

                            <div class="cart-items">
                                <div class="crt-img">
                                    <img src="<?php echo 'uploads/products/' . $res[0]; ?>" alt="">
                                </div>
                                <div class="crt-text">
                                    <h3><?= $cart['Title'] ?></h3>
                                    <p class="m-0" style="    font-size: 14px;"><?php echo 'By ' . $cart['BTitle']; ?></p>
                                    <div class="crt-page-retting">
                                        <div class="rating">
                                            <?php
                                            $cpid = $cart['p_id'];
                                            $review = mysqli_query($con, "SELECT * from productreview where  `p_id` = '$cpid' ");
                                            $count = 0;
                                            $sum_str = 0;

                                            if ($review) {
                                                if (mysqli_num_rows($review) > 0) {
                                                    while ($row = mysqli_fetch_array($review)) {
                                                        $count++;
                                                        $sum_str += $row['Rating'];
                                                    }
                                                    $star = round($sum_str / $count);
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
                                        <?php
                                        if (mysqli_num_rows($review) > 0) {
                                            echo "<p>  $c Ratings </p>";
                                        } else {
                                            // echo "<p> ( There are no reviews yet. )</p>";
                                        }
                                        ?>
                                    </div>
                                    <div class="qua-del">
                                        <div class="quantity m-0">
                                            <input name="quantity" data-id="<?= 'a' . $cart['cart_id'] ?>" type="hidden" class="pid" value="<?= $cart['p_id'] ?>">
                                            <a href="#" data-id="<?= 'a' . $cart['cart_id'] ?>" class="quantity__minus updateQty"><span>-</span></a>
                                            <input name="quantity" disabled data-id="<?= 'a' . $cart['cart_id'] ?>" type="text" class="quantity__input" value="<?= $cart['cart_qty'] ?>">
                                            <a href="#" data-max="<?= $cart['QTY'] ?>" data-id="<?= 'a' . $cart['cart_id'] ?>" class="quantity__plus updateQty"><span>+</span></a>
                                        </div>
                                        <a href="delcart.php?cart_id=<?= $cart['cart_id'] ?>&u_id=<?= $cart['u_id'] ?> ">
                                            <div class="del-crt-icon">
                                                <i class="bi bi-trash3"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="crt-page-price">
                                        <h3> &#8377;<?= $cart['SellPrice'] * $cart['cart_qty']  ?>.00</h3>
                                    </div>
                                </div>
                            </div>


                    <?php

                    $total = $cart['SellPrice'] * $cart['cart_qty'];
                    $sum += $total;
                    $c++;
            

                    ?>

                        </div>
                        <?php
                        }
                    }

                   
                    if (mysqli_num_rows($view_cart) == 0) {
                    } else {



                    ?>
        </div>
                    
                        <div class="col-md-6 col-lg-3 mt-4 mt-lg-0 mb-3">
                            <div class="cart-box">
                                <div class="crt-box-top">
                                    <p><i class="bi bi-check"></i>Your Order is eligible for FREE Delivery.</p>
                                </div>
                                <div class="crt-box-bot">
                                    <h3>Subtotal (<?= $c ?> item): <strong>&#8377;<?= $sum ?>.00</strong></h3>
                                    <a href="checkout.php">
                                        Proceed to Buy
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
        </div>
    </div>
</section>