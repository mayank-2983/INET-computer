<div class="container">
<?php
                $cont2_qry=mysqli_query($con,"SELECT * FROM store_detail");
                $cont2_arr =mysqli_fetch_array($cont2_qry);
                
                ?>
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="foot-block">
                            <div class="foot-txt">
                                <h3>ABOUT US</h3>
                                <p><?= $cont2_arr['Address'] ?></p>
                                <p class="m-0"><a href="mailto:<?= $cont2_arr['Email'] ?>" class="ms-2"><?= $cont2_arr['Email'] ?></a></p>
                                <p><a href="tel:+91<?= $cont2_arr['mobile_no'] ?>" class="ms-2">TEXT: +91 <?= $cont2_arr['mobile_no'] ?></a></p>
                                <div class="foot-logo">
                                    <!-- <img width="120px" src="img/logo/logo.png" alt=""> -->
                                    <!-- <img width="130px" src="img/logo/logo.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="foot-block">
                            <div class="foot-txt">
                                <h3> QUICK LINK
                                </h3>
                                <ul class="foot-link">
                                    <li> <a href="#"> Contact Us</a></li>
                                    <li> <a href="#"> About Us</a></li>
                                    <li> <a href="#"> Payment</a></li>
                                    <li> <a href="#"> Careers</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12  col-md-3">
                        <div class="foot-block">
                            <div class="foot-txt">
                                <h3> CUSTOMER SERVICE
                                </h3>
                                <?php
                                $poli_sel = mysqli_query($con,"SELECT * FROM policy WHERE `Status`='active'");
                                
                                ?>
                                <ul class="foot-link">
                                    <?php 
                                    while( $data= mysqli_fetch_array($poli_sel)){
                                        ?>
                                            <li> <a href="policy_details.php?id=<?= $data['id'];?>"><?=$data['Title']; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                     
                                </ul>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <!-- <div class="foot-block">
                            <div class="foot-txt">
                                <h3>Social Links</h3>
                                <p>Eeget facilisi uturpis nisi tempus porttitor nunc interdum. Elit a auctor eget auctor.</p>
                                
                            </div>
                        </div> -->

                        <div class="foot-block">
                            <div class="news-latter">
                                <div class="foot-txt">
                                    <h3> Newslatter</h3>
                                </div>
                                
                                <div class="mail-box">
                                    <form method="post"  action="news_letter.php">
                                    <input class="form-control email-inp" required autocomplete="off" name="email"  type="email" placeholder="Email*">
                                    <input class="btn btn-primary" name="news_letter" style="font-size: 14px;" type="submit" value="Subscribe">
                                    <!-- <input type="submit" name="news_letter" class="popup-sub" value="SUBMIT"> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>