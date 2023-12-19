<section class="categories-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cate-container">
                                <div class="sec-head">
                                    <h2 class="fw-bold">Categories</h2>
                                </div>

                                <div class="tabs">
                                    <div class="tab__btns">
                                        <?php
                                            $categories = mysqli_query($con,"SELECT * FROM `categories` WHERE `CStatus` = 'Active' ORDER BY `categories`.`created_at` DESC");

                                            $s=0;
                                            
                                            while ($row = mysqli_fetch_array($categories))
                                            {
                                                $s+=1; 
                                        ?>
                                        <button class="tab__btn <?php  echo $s == 1 ? 'tab__btn--active' : ''; ?> " data-item="<?php echo "c".$row['c_id'] ?>">
                                            <span><?php echo $row['CTitle']; ?></span>
                                        </button>
                                        <?php
                                            }
                                            
                                        ?>
                                    </div>

                                    <div class="tab__items">
                                     
                                    <?php
                                        $cat = mysqli_query($con,"SELECT * FROM `categories` WHERE `CStatus` = 'Active' ORDER BY `categories`.`created_at` DESC");

                                        $j=0;
                                        while ($c = mysqli_fetch_array($cat)) {
                                            $c_id = $c['c_id'];

                                            $j+=1;
                                    ?>
                                        <div id="<?php echo "c".$c_id;  ?>" class="tab__item  <?php  echo $j == 1 ? 'tab__item--active' : ''; ?>">

                                            <div class="swiper mySwiper3">
                                                <div class="swiper-wrapper">

                                                    
                                            <?php
                                                $product = mysqli_query($con,"SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.c_id = $c_id  ");
                                                while ($data = mysqli_fetch_array($product)){
                                                    $res=$data['PImage'];
                                                    $res=explode(",",$res);

                                            ?>


                                                    <div class="swiper-slide">
                                                         

                                                        <div class="product-container">
                             
                            <a href="product.php?p_id=<?= $data['p_id'] ?>">
                                <div class="pro-img">
                                     
                                    <img class="img-fluid" src="<?php echo 'uploads/products/' . $res[0]; ?>" alt="">

                                </div>
                            </a>
                            
                            <div class="product-txt">
                            <div class="watchlist">
                                       <a href="handelwishlist.php?p_id=<?= $data['p_id'] ?>"  class="wishlist-btn">
                                            <i class="bi bi-bag-heart"></i>
                                       </a>
                                    </div>
                            <div class="quick-view" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo "a".$data['p_id'] ?>" style="    padding: 11px 0;">
                                    <p>Quick View</p>
                                </div>
                                <span class="pro-categories">
                                    <a href="#"><?php echo $data['CTitle'] ?></a>
                                    <a href="#"><?php echo $data['BTitle'] ?></a>
                                </span>
                                <h3> <?php echo $data['Title'] ?> </h3>
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <h2> <?php echo "₹ ".$data['SellPrice'].".00" ?></h2>
                            </div>
                        </div>
                                                    </div>


                                                    <?php
                                                }
                                            ?>


                                                </div>
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
                </div>
            </section>