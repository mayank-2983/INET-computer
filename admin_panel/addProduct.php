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
    <title>Inet Computer Admin</title>
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
                            <h2> Add Product</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <form action="product.php" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cat-title" class="form-label">Title</label>
                                <input type="text" class="form-control Title" name="Title" id="cat-title">
                                <span class="error" id="Title-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-dis" class="form-label">Discription</label>
                                <textarea class="form-control Discription" id="editor1" name="Discription"> </textarea>
                                <span class="error" id="Discription-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" class="form-control Image" name="PImage[]" id="cate-img" multiple>
                                <span class="error" id="PImage-error"></span>
                            </div>

                            <div class="pd-20 mb-20 card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="cat-title" class="form-label">Price</label>
                                            <input type="number" class="form-control Price" placeholder="₹  0.00" name="Price" id="cat-title">
                                            <span class="error" id="Price-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="pro-dic" class="form-label">Discount</label>
                                            <input type="number" name="Discount" class="form-control" placeholder=" 0.00 %" id="pro-dic" value="0">
                                            <span class="error" id="Discount-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="inp-txt">
                                            <label for="cat-qunt" class="form-label">Quantity</label>
                                            <input type="number" class="form-control Quantity" value="0" placeholder="0 " id="cat-qunt" name="QTY">
                                            <span class="error" id="QTY-error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-satus" class="form-label">Status</label>

                                <select class="form-control Status" id="cate-satus" name="Status">
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                </select>
                                <span class="error" id="Status-error"></span>
                            </div>
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-cate" class="form-label">Categories</label>

                                <select class="form-control Categories" id="cate-cate" name="c_id">
                                    <option value="">--Select category--</option>
                                    <?php

                                    $result1 = mysqli_query($con, "SELECT * FROM categories WHERE `CStatus` = 'active'");
                                    while ($row = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option value="<?php echo $row['c_id']; ?>">
                                            <?php echo $row["CTitle"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="error" id="Category-error"></span>
                            </div>
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-brd" class="form-label">Brand</label>

                                <select class="form-control Brand" id="cate-brd" name="b_id">
                                    <option value="">--Select Brand--</option>
                                    <?php

                                    $result2 = mysqli_query($con, "SELECT * FROM brand WHERE `BStatus` = 'active'");
                                    while ($row = mysqli_fetch_array($result2)) {
                                    ?>
                                        <option value="<?php echo $row['b_id']; ?>">
                                            <?php echo $row["BTitle"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="error" id="Brand-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-popolat" class="form-label"><input type="checkbox" name="trending" id=""> Trending</label>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" name="add-product" type="submit" id="submit" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Validation -->

    <script>
        $(document).ready(function() {

            $('#Title-error').hide();
            $('#Discription-error').hide();
            $('#PImage-error').hide();
            $('#Price-error').hide();
            $('#QTY-error').hide();
            $('#Status-error').hide();
            $('#Category-error').hide();
            $('#Brand-error').hide();

            var title_error = true;
            var discription_error = true;
            var image_error = true;
            var price_error = true;
            var qty_error = true;
            var status_error = true;
            var category_error = true;
            var brand_error = true;


            $(".Title").blur(function() {
                check_Title();
            });
            $(".Discription").blur(function() {
                check_Discription();
            });
            $(".Image").blur(function() {
                check_Image();
            });
            $(".Price").blur(function() {
                check_Price();
            });
            $(".Quantity").blur(function() {
                check_Quantity();
            });
            $(".Status").blur(function() {
                check_Status();
            });
            $(".Categories").blur(function() {
                check_Categories();
            });
            $(".Brand").blur(function() {
                check_Brand();
            });



            function check_Title() {
                var title_val = $('.Title').val();
                if (title_val == '') {
                    $('#Title-error').show();
                    $('#Title-error').html("*Please Enter Title!");
                    title_error = false;
                    return false;
                } else {
                    $('#Title-error').hide();
                    title_error = true;
                }
            }

            function check_Discription() {
                var discription_val = $('.Discription').val();
                if (discription_val == '') {
                    $('#Discription-error').show();
                    $('#Discription-error').html("*Please Enter Discription!");
                    discription_error = false;
                    return false;
                } else {
                    $('#Discription-error').hide();
                    discription_error = true;
                }
            }


            function check_Image() {
                var image_val = $('.Image').val();
                if (image_val == '') {
                    $('#PImage-error').show();
                    $('#PImage-error').html("*Please Select Image!");
                    image_error = false;
                    return false;
                } else {
                    $('#PImage-error').hide();
                    image_error = true;
                }
            }

            function check_Price() {
                var price_val = $('.Price').val();
                if (price_val == '') {
                    $('#Price-error').show();
                    $('#Price-error').html("*Please Enter Price!");
                    price_error = false;
                    return false;
                } else {
                    $('#Price-error').hide();
                    price_error = true;
                }
            }

            function check_Quantity() {
                var qty_val = $('.Price').val();
                if (qty_val == '') {
                    $('#QTY-error').show();
                    $('#QTY-error').html("*Please Enter Quantity!");
                    qty_error = false;
                    return false;
                } else {
                    $('#QTY-error').hide();
                    qty_error = true;
                }
            }

            function check_Status() {
                var status_val = $('.Status').val();
                if (status_val == '') {
                    $('#Status-error').show();
                    $('#Status-error').html("*Please Select Status!");
                    status_error = false;
                    return false;
                } else {
                    $('#Status-error').hide();
                    status_error = true;
                }
            }

            function check_Categories() {
                var categories_val = $('.Categories').val();
                if (categories_val == '') {
                    $('#Category-error').show();
                    $('#Category-error').html("*Please Select Category!");
                    status_error = false;
                    return false;
                } else {
                    $('#Category-error').hide();
                    status_error = true;
                }
            }

            function check_Brand() {
                var brand_val = $('.Brand').val();
                if (brand_val == '') {
                    $('#Brand-error').show();
                    $('#Brand-error').html("*Please Select Brand!");
                    brand_error = false;
                    return false;
                } else {
                    $('#Brand-error').hide();
                    brand_error = true;
                }
            }

            $('#submit').click(function() {
                title_error = true;
                discription_error = true;
                image_error = true;
                price_error = true;
                qty_error = true;
                status_error = true;
                category_error = true;
                brand_error = true;

                check_Title();
                check_Discription();
                check_Image();
                check_Price();
                check_Quantity();
                check_Status();
                check_Categories();
                check_Brand();

                if (title_error == true && discription_error == true && image_error == true && price_error == true && qty_error == true && status_error == true && category_error == true && brand_error == true) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script>

    <!-- Discount Validation -->
    <script>
        $(document).ready(function() {
            $('#Discount-error').hide();
            $('#pro-dic').on('blur', function() {
                var discount = parseInt($(this).val());
                if (isNaN(discount) || discount < 0 || discount > 100) {
                    $('#Discount-error').show();
                    $('#Discount-error').html("*Enter Discount Between 0 to 100% !");
                    $(this).val('');
                } else {
                    $('#Discount-error').hide();
                    brand_error = true;
                }
            });
        });
    </script>

    <!-- Discount Default 0 -->
    <script>
        const inputField = document.getElementById('pro-dic');
        const submitButton = document.getElementById('submit');
        submitButton.addEventListener('click', function() {
            if (inputField.value === '') {
                inputField.value = 0;
            }
        });
    </script>


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

    <!-- prevent e on number -->
    <script>
        var numberInputs = document.querySelectorAll('input[type="number"]');
        for (var i = 0; i < numberInputs.length; i++) {
            numberInputs[i].addEventListener('keydown', function(event) {
                if (event.keyCode === 69) {
                    event.preventDefault();
                }
            });
        }
    </script>

    <!-- alertify js -->
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