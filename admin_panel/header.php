<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Inet Conputer - Admin Dashboard</title>

    <!-- Site favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="vendors/images/InetIcon.jpg"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="vendors/images/InetIcon.jpg"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="vendors/images/InetIcon.jpg"
    />

    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- alertify -->
    <link
      rel="stylesheet"
      href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"
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
    
    .brand-logo a .svg, .brand-logo a img{
      width: 120px !important;
    }
    </style>
  </head>

  <body>
    <div class="header">
      <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
          class="search-toggle-icon bi bi-search"
          data-toggle="header_search"
        ></div>
         
      </div>
      <div class="header-right">
        <div class="user-info-dropdown">
          <div class="dropdown">
            <a
              class="dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
            >
              <span class="user-icon">
                <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="" />
              </span>
              <?php
                        $aid = $_SESSION['admin'];
                        $query = mysqli_query($con, "SELECT * FROM admin WHERE id = '$aid'");
                        $row = mysqli_fetch_array($query);
                        ?>
              <span class="user-name"
                ><?= $row["First_Name"] . " " . $row["Last_Name"] ?></span
              >
            </a>
            <div
              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
              <a class="dropdown-item" href="profile.php"
                ><i class="dw dw-user1"></i> Profile</a
              >

              
              <a class="dropdown-item" href="logout.php"
                ><i class="dw dw-logout"></i> Log Out</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="right-sidebar">
      <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
          Layout Settings
          <span class="btn-block font-weight-400 font-12"
            >User Interface Settings</span
          >
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
          <i class="icon-copy ion-close-round"></i>
        </div>
      </div>
      <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
          <h4 class="weight-600 font-18 pb-10">Header Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-white active"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-dark"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-light"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-dark active"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
          <div class="sidebar-radio-group pb-10 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-1"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebaricon-1"
                ><i class="fa fa-angle-down"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-2"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-2"
              />
              <label class="custom-control-label" for="sidebaricon-2"
                ><i class="ion-plus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-3"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-3"
              />
              <label class="custom-control-label" for="sidebaricon-3"
                ><i class="fa fa-angle-double-right"></i
              ></label>
            </div>
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
          <div class="sidebar-radio-group pb-30 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-1"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-1"
                ><i class="ion-minus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-2"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-2"
              />
              <label class="custom-control-label" for="sidebariconlist-2"
                ><i class="fa fa-circle-o" aria-hidden="true"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-3"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-3"
              />
              <label class="custom-control-label" for="sidebariconlist-3"
                ><i class="dw dw-check"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-4"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-4"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-4"
                ><i class="icon-copy dw dw-next-2"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-5"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-5"
              />
              <label class="custom-control-label" for="sidebariconlist-5"
                ><i class="dw dw-fast-forward-1"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-6"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-6"
              />
              <label class="custom-control-label" for="sidebariconlist-6"
                ><i class="dw dw-next"></i
              ></label>
            </div>
          </div>

          <div class="reset-options pt-30 text-center">
            <button class="btn btn-danger" id="reset-settings">
              Reset Settings
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="left-side-bar">
      <div class="brand-logo">
        <a href="index.php">
        <?php 
            $sel_logo = mysqli_query($con,"SELECT * FROM `logo` limit 1");
            $log_arr=mysqli_fetch_array($sel_logo);
            ?>
          <img
            
            src="../uploads/logo/<?= $log_arr['Image'] ?>"
            alt=""
            class="d-block mx-auto"
          />
          
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
          <i class="ion-close-round"></i>
        </div>
      </div>
      <div class="menu-block customscroll">
        <div class="sidebar-menu">
          <ul id="accordion-menu">
            <li>
              <a href="index.php" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-archive"></span
                ><span class="mtext"> Dashboard</span>
              </a>
            </li>
            <li>
              <a href="config.php" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-bug"></span>
                <span class="mtext">Config</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-diagram-3"></span
                ><span class="mtext">About us</span>
              </a>
              <ul class="submenu">
                <li><a href="addAbout.php">Add Contains</a></li>
                <li><a href="viewAbout.php">View Contains</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-calendar4-week"></span
                ><span class="mtext">Categories</span>
              </a>
              <ul class="submenu">
                <li><a href="addcategories.php">Add Categories</a></li>
                <li><a href="viewCategories.php">View Categories</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-table"></span
                ><span class="mtext">Brands</span>
              </a>
              <ul class="submenu">
                <li><a href="addBrand.php">Add Brands</a></li>
                <li><a href="viewBrand.php">View Brands</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-back"></span
                ><span class="mtext">Product</span>
              </a>
              <ul class="submenu">
                <li><a href="addProduct.php">Add Product</a></li>
                <li><a href="viewProduct.php">View Product</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-chat-right-dots"></span
                ><span class="mtext">Blog</span>
              </a>
              <ul class="submenu">
                <li><a href="addBlog.php">Add Blog</a></li>
                <li><a href="viewBlog.php">View Blog</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <span class="micon bi bi-hdd-stack"></span
                ><span class="mtext">Policy</span>
              </a>
              <ul class="submenu">
                <li><a href="addPolicy.php">Add Policy</a></li>
                <li><a href="viewPolicy.php">View Policy</a></li>
              </ul>
            </li>
           
            <li>
              <a href="viewOrder.php" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-archive"></span
                ><span class="mtext"> Order Details</span>
              </a>
            </li>

            <li>
              <a href="userDetail.php" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-receipt-cutoff"></span>
                <span class="mtext">User Detail</span>
              </a>
            </li>

            <li>
              <a href="userComment.php" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-receipt-cutoff"></span>
                <span class="mtext">User Comments</span>
              </a>
            </li>

           
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <!-- welcome modal end -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>

    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="vendors/plugins/apexcharts/apexcharts.min.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript
      ><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
      ></iframe
    ></noscript>
  </body>
</html>
