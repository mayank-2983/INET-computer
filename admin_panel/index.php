<?php
include "connect.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Inet Computer Admin</title>

    <!-- Site favicon -->

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="vendors/images/favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="vendors/images/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="vendors/images/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="vendors/images/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <link rel="stylesheet" href="./vendors/styles/ionicons.min.css" />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="vendors/styles/icon-font.min.css"
    />

    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
      (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          "gtm.start": new Date().getTime(),
          event: "gtm.js",
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>

    <!-- End Google Tag Manager -->
    <style>
      .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
      }

      .small-box {
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      }

      .small-box > .inner {
        padding: 10px;
      }

      .small-box h3,
      .small-box p {
        color: #fff;
        z-index: 5;
      }

      .small-box h3 {
        font-size: 38px;
        font-weight: bold;
        margin: 0 0 10px 0;
        white-space: nowrap;
        padding: 0;
        font-family: "Source Sans Pro", sans-serif;
      }

      .small-box p {
        font-size: 15px;
      }

      .small-box .icon {
        -webkit-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        transition: all 0.3s linear;
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0, 0, 0, 0.15);
      }
    </style>
  </head>

  <body>
    <!-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="vendors/images/deskapp-logo.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div> -->

    <?php
	include "header.php";
	?>

    <div class="main-container">
      <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
          <div class="row align-items-center">
            <div class="col-md-4">
              <img src="vendors/images/banner-img.png" alt="" />
            </div>

            <?php
					$id = $_SESSION['admin'];
					$query = "SELECT * FROM `admin` WHERE `id` = '$id'";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_array($result);

					?>
            <div class="col-md-8">
              <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">
                  <?= $row["First_Name"] . " " . $row["Last_Name"] ?>
                </div>
              </h4>
              <p class="font-18 max-width-600">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                hic non repellendus debitis iure, doloremque assumenda. Autem
                modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                mollitia animi error corporis.
              </p>
            </div>
          </div>
        </div>

        <div class="card-box mb-30">
          <section class="content">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #337ab7">
                  <?php
								$product = mysqli_query($con, "SELECT * FROM `product`");

								$total_product = mysqli_num_rows($product);
								?>

                  <div class="inner">
                    <h3><?= $total_product ?></h3>

                    <p>Products</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-android-cart"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div
                  class="small-box"
                  style="background-color: #d81b60 !important"
                >
                  <?php
								$pending = mysqli_query($con, "SELECT * FROM `orders` WHERE `status` = 0");

								$total_order_pending = mysqli_num_rows($pending);
								?>
                  <div class="inner">
                    <h3><?= $total_order_pending ?></h3>

                    <p>Pending Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-clipboard"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #00a65a">
                  <?php
								$Completed = mysqli_query($con, "SELECT * FROM `orders` WHERE `status` = 1");

								$total_order_Completed = mysqli_num_rows($Completed);
								?>
                  <div class="inner">
                    <h3><?= $total_order_Completed ?></h3>

                    <p>Completed Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-android-checkbox-outline"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #00c0ef">
                  <?php
								$Customers = mysqli_query($con, "SELECT * FROM `user`");

								$total_order_Customers = mysqli_num_rows($Customers);
								?>
                  <div class="inner">
                    <h3><?= $total_order_Customers ?></h3>

                    <p>Active Customers</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-person-stalker"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div
                  class="small-box"
                  style="background-color: #ff851b !important"
                >
                  <?php
								$Categories = mysqli_query($con, "SELECT * FROM `categories`");

								$total_order_Categories = mysqli_num_rows($Categories);
								?>
                  <div class="inner">
                    <h3><?= $total_order_Categories ?></h3>

                    <p>Categories</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-android-menu"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div
                  class="small-box"
                  style="background-color: #dd4b39 !important"
                >
                  <?php
								$Brands = mysqli_query($con, "SELECT * FROM `brand`");

								$total_order_Brands = mysqli_num_rows($Brands);
								?>
                  <div class="inner">
                    <h3><?= $total_order_Brands ?></h3>

                    <p>Brands</p>
                  </div>
                  <div class="icon">
                    <i class="ionicons ion-person-stalker"></i>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
           
          
          © 2023 inetCom. Powered by Inet Computer <a href="../index.php" target="_blank"
            ><?= $row["First_Name"] . " " . $row["Last_Name"] ?></a
          > .
        </div>
      </div>
    </div>

    <!-- End Google Tag Manager (noscript) -->
  </body>
</html>
