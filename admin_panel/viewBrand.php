<?php include("connect.php"); ?>

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
                <h2 class="h4 pd-20">Brands</h2>
                <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                    <div class="add-btn">
                        <a class="btn btn-success" href="addbrand.php">Add</a>
                    </div>
                    <div class="add-search">
                        <!-- <form> -->
                        <div class="form-group mb-0 position-relative">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" id="brand-search" placeholder="Search Here" autocomplete="off">
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
                <table class="data-table table nowrap" id="table-brand">
                    <thead>
                        <tr>

                            <th>Brand Title</th>
                            <th class="table-plus datatable-nosort">Image</th>
                            <th>Status</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $brand = mysqli_query($con, "SELECT * FROM brand");
                        while ($row = mysqli_fetch_array($brand)) {
                        ?>
                            <tr>



                                <td>
                                    <h5 class="font-16"><?= $row['BTitle'] ?></h5>
                                </td>
                                <td class="table-plus">
                                    <img src="<?php echo '../uploads/Brands/' . $row['BImage']; ?>" width="70" height="70" alt="" />
                                </td>
                                <td><?= $row['BStatus'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="fa fa-chevron-circle-down" style="font-size: 20px;"></i>

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="editBrand.php?b_id=<?= $row['b_id'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="deleteBrand.php?b_id=<?= $row['b_id'] ?>"><i class="dw dw-delete-3"></i> Delete</a>
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
        $("#brand-search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "brand-search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-brand").html(data);
                }
            });
        });
    });
</script>

</html>