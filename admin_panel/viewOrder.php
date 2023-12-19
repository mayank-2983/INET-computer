<?php
include "connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendors/styles/style.css">
    <!-- Site favicon -->
    <title>Inet Computer Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon/favicon-16x16.png" />
    <link rel="manifest" href="vendors/images/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

</head>

<body>
    <?php
    //   include headers 
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">


            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Orders</h2>
                <div class="d-flex justify-content-end align-items-center mb-3 px-3">

                    <div class="add-search">
                        <!-- <form> -->
                        <div class="form-group mb-0 position-relative">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" id="order-search" placeholder="Search Here" autocomplete="off">
                        </div>
                        <!-- </form> -->
                    </div>
                </div>


                <table class="data-table table nowrap" id="table-order">
                    <thead>
                        <tr>
                            <th class="no-mobile">Id</th>
                            <th>User</th>
                            <th>Tracking No</th>

                            <th class="no-mobile">Price</th>
                            <th>Status</th>
                            <th class="no-mobile">Date</th>

                            <th class="">View</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "connect.php";

                        $query = "SELECT * FROM `orders`,`user` WHERE orders.`u_id` = user.`u_id` ORDER BY `orders`.`created_at` DESC";
                        $orders = mysqli_query($con, $query);

                        if (mysqli_num_rows($orders) > 0) {
                            foreach ($orders as $item) {
                                $date2 = $item['created_at'];
                                $date = date('Y-m-d', strtotime($date2));
                        ?>
                                <tr>

                                    <td class="no-mobile">
                                        <?= $item['id'] ?>
                                    </td>
                                    <td>
                                        <?= $item['UserName'] ?>
                                    </td>
                                    <td class="table-plus">
                                        <?= $item['tracking_no'] ?>
                                    </td>
                                    <td class="no-mobile">
                                        <?= $item['total_price'] . ".00" ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item['status'] == 0) {
                                            echo '<div class="text-warning"> Under Process </div>';
                                        } else if ($item['status'] == 1) {
                                            echo '<div class="text-success">Completed</div>';
                                        } else if ($item['status'] == 2) {
                                            echo '<div class="text-danger"> Canceled! </div>';
                                        }

                                        ?>
                                    </td>
                                    <td class="no-mobile"><?= $date ?></td>
                                    <td>
                                        <a href="viewOrderDetail.php?t=<?= $item['tracking_no'] ?>&&u_id=<?= $item['u_id'] ?>" class="btn btn-primary mob-small"> View Details</a>
                                    </td>
                                </tr>

                        <?php

                            }
                        }
                        ?>



                    </tbody>
                </table>
            </div>

        </div>
    </div>


</body>
<script type="text/javascript">
    $(document).ready(function() {


        // live search 
        $("#order-search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "order-search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-order").html(data);
                }
            });
        });


    });
</script>

</html>