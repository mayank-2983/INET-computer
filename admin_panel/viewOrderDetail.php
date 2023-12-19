<?php
include "connect.php";
if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $u_id = $_GET['u_id'];
    $query = "SELECT * FROM `orders` WHERE `tracking_no` = '$tracking_no' AND `u_id` = '$u_id' ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) < 0) {
        echo "<h4>Something went wrong</h4>";
    } else {

        $data = mysqli_fetch_array($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Site favicon -->
            <title>Inet Computer Admin</title>
            <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/favicon/apple-touch-icon.png" />
            <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon/favicon-32x32.png" />
            <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon/favicon-16x16.png" />
            <link rel="manifest" href="vendors/images/favicon/site.webmanifest" />
            <meta name="msapplication-TileColor" content="#da532c" />
            <meta name="theme-color" content="#ffffff" />
            <link rel="stylesheet" href="vendors/styles/style.css">
            <link rel="stylesheet" href="vendors/styles/core.css">
            <style>
                .crt-tabl td {
                    vertical-align: middle;
                }

                .crt-tabl tr td img {
                    width: 85px;
                }

                .crt-brd {
                    border-radius: 10px;
                    border: 1px solid rgb(224 223 223);
                    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                }

                .crt-total {
                    display: flex;
                    justify-content: space-between;
                }

                .form-control:disabled {
                    background-color: white !important;

                    opacity: 1;
                }

                .bor-2 {
                    border: 1px solid #80808061;
                    border-radius: 5px;
                    padding: 5px;
                }
            </style>
        </head>

        <body>
            <?php
            //   include headers 
            include("header.php");
            ?>

            <div class="main-container">
                <div class="pd-ltr-20">


                    <div class=" adm-form-hed mb-30">
                        <h2 class=" pd-20">Orders Details</h2>
                        <hr>

                    </div>

                    <section class="vod">
                        <div class="container">


                            <div class="row ">

                                <div class="col-12 card-box mb-30 pd-20">
                                    <div class="">
                                        <div class="crt-hed">
                                            <h3>Besic Details</h3>

                                            <hr>
                                        </div>
                                        <div class="cart-frm">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-6  mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-name">Name: </label>
                                                            <input type="text" class="form-control" disabled value="<?= $data['name'] ?>" id="crt-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-email">Email: </label>
                                                            <input type="email" class="form-control" disabled value="<?= $data['email'] ?>" id="crt-email">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-phone">Phone: </label>
                                                            <input type="number" class="form-control" disabled value="<?= $data['phone'] ?>" id="crt-phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-pincode">Pincode: </label>
                                                            <input type="number" class="form-control" disabled value="<?= $data['pincode'] ?>" id="crt-pincode">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-ctr">Country: </label>
                                                            <?php
                                                            $c_id = $data['country_id'];
                                                            $country = mysqli_query($con, "SELECT * FROM `countries` WHERE `id`='$c_id'");
                                                            $carr = mysqli_fetch_array($country);
                                                            ?>
                                                            <input type="text" class="form-control" id="crt-ctr" disabled value="<?= $carr['name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-st">State: </label>

                                                            <?php
                                                            $s_id = $data['state_id'];
                                                            $states = mysqli_query($con, "SELECT * FROM `states` WHERE `id`='$s_id'");
                                                            $sarr = mysqli_fetch_array($states);
                                                            ?>
                                                            <input type="text" class="form-control" id="crt-st" disabled value="<?= $sarr['name'] ?>">

                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-city">City: </label>

                                                            <?php
                                                            $city_id = $data['city_id'];
                                                            $city_sql = mysqli_query($con, "SELECT * FROM `cities` WHERE `id`='$city_id'");
                                                            $city = mysqli_fetch_array($city_sql);
                                                            ?>
                                                            <input type="text" class="form-control" id="crt-city" disabled value="<?= $city['name'] ?>">

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="cart-frm-inp">
                                                            <label for="crt-add">Address: </label>
                                                            <textarea class="form-control" name="" disabled id="crt-add"> <?= $data['address'] ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>




                                </div>
                                <div class="col-12 card-box mb-30 pd-20">
                                    <div class="crt-hed mb-3">
                                        <h3>Item Details</h3>


                                    </div>

                                    <div class="crt-tabl">
                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th>image</th>
                                                    <th>Title</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                $product = "SELECT * FROM `orders`,`order_items`,`product` WHERE `order_items`.`order_id`=`orders`.`id` AND `order_items`.`product_id`=`product`.`p_id` AND `tracking_no` = '$tracking_no' AND `u_id` = '$u_id'";
                                                $order_run = mysqli_query($con, $product);

                                                if (mysqli_num_rows($order_run) > 0) {
                                                    foreach ($order_run as $items) {
                                                        $res = $items['PImage'];
                                                        $res = explode(",", $res);
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#">
                                                                    <img src="../uploads/products/<?= $res[0] ?>" alt="" />
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="cart-p-title">
                                                                    <h5><?= $items['Title'] ?></h5>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="crt-p-price">
                                                                    <h5><?= $items['SellPrice'] . '.00' ?></h5>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="cart-p-qty">
                                                                    <h5>X <?= $items['qty'] ?></h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }


                                                ?>
                                            </tbody>







                                        </table>
                                        <div class="crt-total mb-4">

                                            <h5>Total Price:</h5>

                                            <h5><?= $data['total_price'] . '.00' ?></h5>

                                        </div>

                                        <div class="btn-cod mt-2   bor-2">
                                            <label for="pay-mod">Payment Mode: </label>
                                            <?= '  ' . $data['payment_mode'] ?>
                                        </div>

                                        <div class="btn-cod mt-2">
                                            <form action="order.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                                                <label for="pay-mod">Status: </label>
                                                <select name="order_status" class="form-control" id="">
                                                    <option value="0" <?php if ($data['status'] == 0) {
                                                                            echo "selected";
                                                                        } ?>>Under Process</option>
                                                    <option value="1" <?php if ($data['status'] == 1) {
                                                                            echo "selected";
                                                                        } ?>>Completed</option>
                                                    <option value="2" <?php if ($data['status'] == 2) {
                                                                            echo "selected";
                                                                        } ?>>Canceled</option>
                                                </select>
                                                <div class="button-upd mt-3">
                                                    <button type="submit" name="update-order" class="btn btn-primary">Update Status</button>
                                                </div>
                                            </form>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </div>


        </body>

        </html>
<?php
    }
} else {
    echo "<h4>Something went wrong</h4>";
}

?>