<?php
    include "connect.php";
?>

<section class="blog">

                <div class="container">

                    <div class="row justify-content-around mt-80">
                        <div class="col-12">
                            <div class="sec-head mb-4">
                                <h2 class="fw-bold">Latest News From Blog</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="swiper mySwiperblg swip-pad">
                                <div class="swiper-wrapper">

                                <?php 
                                    $select_blog = mysqli_query($con, "SELECT * FROM `blog` WHERE `Status` = 'active' ORDER BY `created_at` DESC limit 3");

                                    while ($row = mysqli_fetch_array($select_blog)) {

                                        $created_at =  $row['created_at'];
                                        $date = date('Y-m-d',strtotime($created_at));
                                        $month = date('M', strtotime($date));
                                        $day = date('d', strtotime($date));
                                        $b_id = $row['blog_id'];
                                ?>
                                    <div class="swiper-slide">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <img class="img-fluid" src="<?php echo 'uploads/blog/'.$row['Image']; ?>" alt="">
                                            </div>
                                            <div class="date">
                                                <h4 class="text-center"><?= $day ?><br><?php echo $month;   ?></h4>
                                            </div>
                                            <div class="blog-txt">
                                                <h3><?php echo $row['Title'] ?></h3>
                                                <div class="blog-link">
                                                    <a href="blog-details.php?blog_id=<?= $b_id ?>"> <i class="bi bi-arrow-right"></i> Read More</a>
                                                    <div class="overlay"></div>
                                                </div>
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