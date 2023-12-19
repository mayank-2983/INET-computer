<?php
require('connect.php');

include("myfuncations.php");

?>


<!DOCTYPE html>
<html>

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
    <style>
    .pro_img {
        height: 50px !important;
        width: 50px !important;
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
                            <h2> Edit Product</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <?php
                if (isset($_GET['p_id'])) {
                    $p_id = $_GET['p_id'];
                    $product = getById("product", "p_id", $p_id);

                    if (mysqli_num_rows($product) > 0) {
                        $data = mysqli_fetch_array($product);
                        $i = "";
                        $res = $data['PImage'];
                        $res = explode(",", $res);
                        $count = count($res) - 1;
                ?>
                <form action="product.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $data['p_id'] ?>" name="p_id" class="form-control">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cat-title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="Title" id="cat-title"
                                    value=<?= $data['Title'] ?>>
                                <span class="d-none ">for validation</span>
                            </div>



                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-dis" class="form-label">Discription</label>

                                <textarea class="form-control" id="editor1"
                                    name="Discription"> <?= $data['Discription'] ?> </textarea>
                                <span class="d-none">for validation</span>
                            </div>



                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" class="form-control" name="PImage[]" id="cate-img" multiple>
                                <span class="d-none">for validation</span>
                                <label for="cate-img" class="form-label">Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['PImage'] ?>">

                                <?php
                                        
                                        for ($i = 0; $i < $count; $i++) {

                                        ?>
                                <img class="pro_img" src="../uploads/products/<?= $res[$i] ?>" alt="">
                                <?php
                                        }
                                        ?>
                                <span class="d-none">for validation</span>

                            </div>

                            <div class="pd-20 mb-20 card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="cat-title" class="form-label">Price</label>
                                            <input type="number" class="form-control" placeholder="₹  0.00" name="Price"
                                                id="cat-title" value=<?= $data['Price'] ?>>
                                            <span class="d-none">for validation</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="pro-dic" class="form-label">Discount</label>
                                            <input type="number" name="Discount" class="form-control"
                                                placeholder=" 0.00 %" id="pro-dic" value=<?= $data['Discount'] ?>>
                                            <span class="d-none">for validation</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="cat-qunt" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" placeholder="0 " id="cat-qunt"
                                                name="QTY" value=<?= $data['QTY'] ?>>
                                            <span class="d-none">for validation</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-satus" class="form-label">Status</label>

                                <select class="form-control" id="cate-satus" name="Status">
                                    <option value="active" <?php if ($data['Status'] == "active") {
                                                                        echo "selected";
                                                                    } ?>>
                                        Active</option>
                                    <option value="draft" <?php if ($data['Status'] == "draft") {
                                                                        echo "selected";
                                                                    } ?>>Draft
                                    </option>
                                </select>
                                <span class="d-none">for validation</span>
                            </div>
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-cate" class="form-label">Categories</label>

                                <select class="form-control" id="cate-cate" name="c_id">
                                    <option value="">--Select category--</option>
                                    <?php

                                            $result1 = mysqli_query($con, "SELECT * FROM categories WHERE `CStatus` = 'active'");
                                            while ($row1 = mysqli_fetch_array($result1)) {
                                                echo '<option value="' . intval($row1['c_id']) . '" ' . ($data['c_id'] == intval($row1['c_id']) ? 'selected' : '') . '>' . $row1['CTitle'] . '</option>';
                                            }

                                            ?>

                                </select>
                                <span class="d-none">for validation</span>
                            </div>
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-brd" class="form-label">Brand</label>

                                <select class="form-control" id="cate-brd" name="b_id">
                                    <option value="">--Select Brand--</option>
                                    <?php

                                            $result2 = mysqli_query($con, "SELECT * FROM brand WHERE `BStatus` = 'active'");
                                            while ($row1 = mysqli_fetch_array($result2)) {
                                                echo '<option value="' . intval($row1['b_id']) . '" ' . ($data['b_id'] == intval($row1['b_id']) ? 'selected' : '') . '>' . $row1['BTitle'] . '</option>';
                                            }

                                            ?>
                                </select>
                                <span class="d-none">for validation</span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-popolat" class="form-label"><input type="checkbox" name="trending"
                                        <?php if ($data['trending'] == "1") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> id=""> Trending</label>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" name="edit-product" type="submit"
                                    value="Save">
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    } else {
                        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\">No Category Selected</div>";
                    }
                } else {
                    echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\">No Category Selected</div>";
                }
                ?>




            </div>

        </div>
    </div>

    <script src="./vendors/scripts/ckeditor/ckeditor.js"></script>

    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //CK Editor
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
    });
    $(function() {
        // Datatable
        $('#example1').DataTable()
        //CK Editor
        CKEDITOR.replace('editor1')
    });
    </script>

    </script>
</body>

</html>