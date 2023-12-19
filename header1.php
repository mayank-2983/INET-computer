<div class="container">

    <div class="header-container">
        <div class="logo-img">
            <?php 
            $sel_logo = mysqli_query($con,"SELECT * FROM `logo` limit 1");
            $log_arr=mysqli_fetch_array($sel_logo);
            ?>
            <a href="index.php">

                <img height="100px" src="uploads/logo/<?= $log_arr['Image'] ?>" alt="">
            </a>
        </div>

        <nav class="m1">
            <a href="index.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">Home</a>
            <div class="dropdown">
                <a href="" class="dropbtn" onMouseOver="this.style.color='#00008B'"
                    onMouseOut="this.style.color='black'">SHOP</a>
                <div class="dropdown-content">
                    <div class="drop-cintainer d-flex gap-5">
                        <div class="sub-link">
                            <h6>Categories</h6>

                            <?php
                        $categories = mysqli_query($con, "SELECT * FROM `categories` WHERE `CStatus` = 'Active'");
                        while($cat = mysqli_fetch_array($categories)) 
                        {
                            
                        
                        ?>
                            <a href="categories.php?c_id=<?= $cat['c_id'] ?> " onMouseOver="this.style.color='#00008B'"
                                onMouseOut="this.style.color='black'">
                                <?php echo $cat['CTitle']; ?>
                            </a>
                            <?php 
                        }
                    ?>
                        </div>

                        <div class="sub-link">
                            <a href="#">
                                <img src="img/menu-banner.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="about.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">ABOUT</a>
            <a href="blog.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">Blog</a>
            <!-- <a href="#" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">Pages</a> -->
            <a href="contact.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">CONTACT</a>
            <a href="custom-product.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">CUSTOM PRODUCT</a>
        </nav>

        <div class="head-cons">

            <div class="search-icon pro-icon" data-name="s1">
                <a href="search.php">
                    <img src="./img/site-search-icon.png" alt="">
                </a>
            </div>
            <div class="whish_list pro-icon" data-name="w1">
                <a href="whishlist.php">
                    <img src="./img/favourite.png" alt="">
                    <sup id="wish-sub" class="for-whish"></sup>
                </a>
            </div>
            <div class="cart pro-icon  ">
                <a href="cart.php">
                    <img src="./img/shoppingcart-icon.png" alt="">

                    <sup id="crt-sub" class="for-cart"></sup>

                </a>
            </div>

            <div class="profile pro-icon" data-name="f1">
                <a href="#">
                    <img src="./img/setting-icon.png" alt="">
                </a>
            </div>

            <div class="list pro-icon" id="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
                <i class="bi bi-list"></i>
            </div>
        </div>

        <!-- <form action="" class=" search-from silde-box s1 ">
            <div class="perent d-flex">

                <input type="text" id="search-box" class="box" placeholder="search here...">
                 
                <button type="submit"><i class="bi bi-search"></i></button>

            </div>
            <div class="serchlist">
                gsfgst
            </div>
        </form> -->



        <div class="silde-box login-form f1">
            <ul class="settings">
                <?php if (!(isset($_SESSION['logged_in'])) && !(isset($_COOKIE['u_id']))) { ?>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="login.php">login</a></li>
                <?php } else {
                        $u_id = "";
                        if(isset($_COOKIE['u_id'])){
                            $u_id = $_COOKIE['u_id'];
                        }else{
                            $u_id = $_SESSION['u_id'];
                        }
                        $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `u_id` = '$u_id'");
                        $result_fetch=mysqli_fetch_assoc($sql);
                    ?>
                <li>Hi,
                    <?= $result_fetch['UserName'] ?>
                </li>
                <li><a href="account.php">My Account</a></li>
                <li><a href="whishlist.php">Wishlist</a></li>
                <li><a href="myorder.php">My Order</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
            style="width: 275px;">
            <div class="offcanvas-header">
                <!-- <div class="offcanvas-title" id="offcanvasRightLabel"><img src="./img/logo.png" alt=""
                        style="height: 118px;"></div> -->
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <menu class="">
                    <a href="#">Home</a>
                    <div class="dropdown">
                        <a class="dropbtn" onMouseOver="this.style.color='#00008B'"
                            onMouseOut="this.style.color='black'">SHOP</a>
                        <div class="dropdown-content">
                            <div class="drop-cintainer d-flex gap-5">
                                <div class="sub-link">
                                    <h6>Categories</h6>
        
                                    <?php
                                $categories = mysqli_query($con, "SELECT * FROM `categories` WHERE `CStatus` = 'Active'");
                                while($cat = mysqli_fetch_array($categories)) 
                                {
                                    
                                
                                ?>
                                    <a href="categories.php?c_id=<?= $cat['c_id'] ?> " style="padding: 10px 20px;" onMouseOver="this.style.color='#00008B'"
                                        onMouseOut="this.style.color='black'">
                                        <?php echo $cat['CTitle']; ?>
                                    </a>
                                    <?php 
                                }
                            ?>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <a href="about.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">ABOUT</a>
            <a href="blog.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">Blog</a>
            <!-- <a href="#" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">Pages</a> -->
            <a href="contact.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">CONTACT</a>
            <a href="custom-product.php" onMouseOver="this.style.color='#00008B'" onMouseOut="this.style.color='black'">CUSTOM PRODUCT</a>
                </menu>
            </div>
        </div>
    </div>
</div>