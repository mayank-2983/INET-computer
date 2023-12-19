<?php
include "connect.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Site favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon/favicon-16x16.png" />
    <link rel="manifest" href="vendors/images/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    .error {
        color: red;
    }
    </style>

</head>

<body>

    <?php
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="adm-form-hed">
                            <h2>Settings </h2>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-2"> Logo </h5>
                    <div class="row align-items-end ">
                        <?php
                        $logo = mysqli_query($con, "SELECT * FROM `logo`");
                        $logo_data = mysqli_fetch_array($logo);
                        ?>
                        <div class="col-12 col-md-10">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="logo-img" class="form-label">Image</label>
                                <input type="file" name="logo_img" class="form-control" id="logo-img">
                                <label for="logo-img" class="form-label">Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $logo_data['Image'] ?>">
                                <img width="170px" class="d-block m-auto" src="../uploads/logo/<?= $logo_data['Image'] ?>" alt="">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $logo_data['id'] ?>">
                        <div class="col-12 col-md-2">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" type="submit" id="submit"
                                    name="logo_img" value="Save" onclick="func()">
                            </div>
                        </div>

                    </div>
                    <hr>

                </form>
                <hr>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-2"> Coman Baneer Image </h5>
                    <div class="row align-items-end ">
                        <?php
                        $apb = mysqli_query($con, "SELECT * FROM `all_page_banner`");
                        $data = mysqli_fetch_array($apb);
                        ?>
                        <div class="col-12 col-md-10">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" name="Image" class="form-control" id="all-page-banner-img">
                                <label for="cate-img" class="form-label">Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['Image'] ?>">
                                <img src="../uploads/all_page_banner/<?= $data['Image'] ?>" alt="">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <div class="col-12 col-md-2">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" type="submit" id="submit"
                                    name="all_page_banner" value="Save" onclick="func()">
                            </div>
                        </div>

                    </div>
                    <hr>

                </form>
                <hr>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-2">Store Details </h5>
                    <div class="row align-items-end ">
                        <?php
                        $sd = mysqli_query($con, "SELECT * FROM `store_detail`");
                        $store_detail = mysqli_fetch_array($sd);
                        ?>
                        <div class="col-12 col-md-10">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="store_phone" class=" form-lebel mt-3">Phone</label>
                                <input type="number" name="store_phone" class="form-control" value="<?= $store_detail['mobile_no'] ?>" id="store_phone">
                                
                                <label for="store_email" class=" form-lebel mt-3">Email</label>
                                <input type="email" name="store_email" class="form-control" value="<?= $store_detail['Email'] ?>" id="store_email">

                                <label for="store_address" class=" form-lebel mt-3">Address</label>
                                <textarea class="form-control" name="store_address" id="store_address"  cols="30" rows="10"><?= $store_detail['Address'] ?></textarea>
                                
                                <label for="store_Location" class=" form-lebel mt-3">Location (iframe)</label>
                                <input type="text" name="store_Location" class="form-control" value='<?php echo $store_detail["location"]; ?>' >
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <div class="col-12 col-md-2">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" type="submit" id="submit"
                                    name="Store_Details" value="Save" onclick="func()">
                            </div>
                        </div>

                    </div>
                    <hr>

                </form>
            </div>
        </div>
    </div>



     
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
    <?php if (isset($_SESSION['message'])) { ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success("<?= $_SESSION['message']; ?>");
    <?php }
        unset($_SESSION['message']);
        ?>
    </script>

</body>

</html>