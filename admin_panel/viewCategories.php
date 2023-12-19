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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">


            <div class="card-box mb-30">
                <h2 class="h4 pd-20">Categories</h2>
                <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                    <div class="add-btn">
                        <a class="btn btn-success" href="addcategories.php">Add</a>
                    </div>
                    <div class="add-search">
                        <!-- <form> -->
                        <div class="form-group mb-0 position-relative">
                            <i class="dw dw-search2 search-icon"></i>
                            <input type="text" class="form-control search-input" id="cate-search" placeholder="Search Here" autocomplete="off">
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
                <table class="data-table table nowrap" id="table-cate">
                    <thead>
                        <tr>

                            <th>Category Title</th>
                            <th class="table-plus datatable-nosort">Image</th>

                            <th>Status</th>

                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $categories = mysqli_query($con, "SELECT * FROM categories");
                        while ($row = mysqli_fetch_array($categories)) {
                        ?>

                            <tr>

                                <td>
                                    <h5 class="font-16"><?php echo $row['CTitle']; ?></h5>
                                </td>
                                <td class="table-plus">
                                    <img src="<?php echo '../uploads/category/' . $row['CImage']; ?>" width="70" height="70" alt="" />
                                </td>

                                <td><?php echo $row['CStatus']; ?></td>


                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="fa fa-chevron-circle-down" style="font-size: 20px;"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="editCategories.php?c_id=<?php echo $row['c_id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="deleteCategories.php?c_id=<?php echo $row['c_id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
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
        $("#cate-search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "Categories-search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-cate").html(data);
                }
            });
        });
    });
</script>

</html>