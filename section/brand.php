<section class="brands">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiperbrd">
                                <div class="swiper-wrapper align-items-center" >
                                    <?php
                                        $brands = mysqli_query($con,"SELECT * FROM brand WHERE `BStatus` = 'active'");
                                        while($row = mysqli_fetch_array($brands)){

                                        $bid=$row['b_id'];
                                        $pro=mysqli_query($con,"SELECT * FROM product WHERE b_id='$bid' and status='active'");
                                        $is_record = mysqli_num_rows($pro);
                                        if($is_record > 0){
                                    ?>
                                    <div class="swiper-slide" style=" padding: 27px 30px;">
                                        <div class="brd-img">
                                            <a class="redirect-cls" href="brands.php?b_id=<?= $row['b_id'] ?> ">
                                                <img class="img-fluid" src="<?php echo 'uploads/brands/'.$row['BImage']; ?> " alt="">
                                            </a>
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
            </section>

