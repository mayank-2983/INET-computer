<?php include("connect.php"); ?>

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

</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">


            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Product</h2>
                <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                    <div class="add-btn">
                        <a class="btn btn-success" href="addproduct.php">Add</a>
                    </div>
                    <div class="add-search">
                        <!-- <form> -->
                        <div class="form-group mb-0 position-relative">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" id="product-search" placeholder="Search Here" autocomplete="off">
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
                <table class="data-table table nowrap" id="table-product">

                    <thead>
                        <tr>

                            <th>Title</th>
                            <th class="table-plus datatable-nosort">Image</th>
                            <th class="no-mobile">Price</th>
                            <th class="no-mobile">Discount</th>
                            <th>Sell Price</th>
                            <th class="no-mobile">Quantity</th>
                            <th>Status</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $product = mysqli_query($con, "SELECT * FROM product");
                        while ($row = mysqli_fetch_array($product)) {
                            $res = $row['PImage'];
                            $res = explode(",", $res);
                        ?>
                            <tr>



                                <td>
                                    <h5 class="font-16"><?php echo $row['Title']; ?></h5>
                                </td>
                                <td class="table-plus">
                                    <img src="<?php echo '../uploads/products/' . $res[0]; ?>" width="70" height="70" alt="" />
                                </td>
                                <td class="no-mobile"><?php echo $row['Price']; ?></td>
                                <td class="no-mobile"><?php echo $row['Discount']; ?></td>
                                <td><?php echo $row['SellPrice']; ?></td>
                                <td class="no-mobile"><?php echo $row['QTY']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="fa fa-chevron-circle-down" style="font-size: 20px;"></i>

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="edit_product.php?p_id=<?php echo $row['p_id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="deleteProduct.php?p_id=<?php echo $row['p_id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
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
        $("#product-search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "product-search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-product").html(data);
                }
            });
        });


    });
</script>

</html>