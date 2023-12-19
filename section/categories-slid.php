<?php   ?>
<section class="categories">

                <div class="container">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <?php 
                                $categories = mysqli_query($con, "SELECT * FROM `categories` WHERE `CStatus` = 'Active'");
                                while($data = mysqli_fetch_array($categories)) 
                                {
                                    $cid = $data['c_id'] ;

                                    $no_of_product = mysqli_query($con," SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`c_id`=$cid");
                                    $s=0;
                                    while($d = mysqli_fetch_array($no_of_product)) 
                                    {
                                        $s+=1;
                                    }
                            ?>
                                <div class="swiper-slide">
                                    <a class="redirect-cls" href="categories.php?c_id=<?= $data['c_id'] ?> ">
                                    <div class="container">
                                        <div class="categorise-item">
                                            <div class="cate-img">
                                                
                                                <img src="<?php echo 'uploads/category/'.$data['CImage']; ?>" alt="">
                                            </div>
                                            <div class="cate-txt">
                                                <h3><?php echo $data['CTitle']; ?></h3>
                                                <p> <span><?php echo $s; ?></span> products</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            <?php
                                }
                            
                            ?>


                        </div>


                    </div>
                </div>
            </section>