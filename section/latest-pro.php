<section class="latest-product">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="sec-head">
                <h2 class="fw-bold">latest product</h2>
            </div>


           



            <div class="swiper mySwiper3 swip-pad">

                <div class="swiper-wrapper"  >
            <?php
                $latest = mysqli_query($con,"SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' and product.trending = 1   ORDER BY `product`.`created_at` DESC");

                while ($row = mysqli_fetch_array($latest)) {
                    $res=$row['PImage'];
                    $res=explode(",",$res);
            ?>   
                
                    <div class="swiper-slide">
                        <div class="product-container">
                            <a href="product.php?p_id=<?= $row['p_id'] ?>">
                            <div class="pro-img">
                               
                                <img class="img-fluid" src="<?php echo 'uploads/products/'.$res[0]; ?>" alt="">
                               
                            </div>
                            </a>
                            <div class="product-txt">
                            <div class="watchlist">
                            <div class="addWhishList" data-id="<?= $row['p_id'] ?>">
                                        <i class="bi bi-bag-heart"></i>
                                       </div>
                                    </div>
                            <div class="quick-view" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo "a".$row['p_id'] ?>">
                                    <p>Quick View</p>
                                </div>
                                <span class="pro-categories">
                                <a href="categories.php?c_id=<?= $row['c_id'] ?>"><?php echo $row['CTitle'] ?></a>
                                    <a href="brands.php?b_id=<?= $row['b_id'] ?>"><?php echo $row['BTitle'] ?></a>
                                </span>
                                <h3> <?php echo $row['Title'] ?></h3>
                                <div class="rating">
                                <?php
                                $cpid = $row['p_id'];
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
                                <h2><?php echo "₹ ".$row['SellPrice'].".00" ?></h2>
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
</section>