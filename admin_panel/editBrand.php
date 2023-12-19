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
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style>
        .img {
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
                            <h2> Edit Brand</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <?php
                if (isset($_GET['b_id'])) {
                    $b_id = $_GET['b_id'];
                    $brand = getById("brand", "b_id", $b_id);
                    if (mysqli_num_rows($brand) > 0) {
                        $data = mysqli_fetch_array($brand);
                ?>
                        <form action="brand.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value=<?= $data['b_id'] ?> name="b_id" class="form-control">
                            <div class="row">

                                <div class="col-12 col-lg-9">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cat-title" class="form-label">Title</label>
                                        <input type="text" value=<?= $data['BTitle'] ?> name="BTitle" class="form-control" id="cat-title">
                                        <span class="d-none">for validation</span>
                                    </div>



                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-dis" class="form-label">Discription</label>

                                        <textarea class="form-control" id="editor1" name="BDiscription"><?= $data['BDiscription'] ?>   </textarea>
                                        <span class="d-none">for validation</span>
                                    </div>



                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-img" class="form-label">Image</label>
                                        <input type="file" name="BImage" class="form-control" id="cate-img">
                                        <label for="cate-img" class="form-label">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['BImage'] ?>">
                                        <img class="img" src="../uploads/brands/<?= $data['BImage'] ?>" alt="">
                                        <span class="d-none">for validation</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-satus" class="form-label">Status</label>

                                        <select class="form-control" name="BStatus" id="cate-satus">

                                            <option value="active" <?php if ($data['BStatus'] == "active") {
                                                                        echo "selected";
                                                                    } ?>>Active</option>
                                            <option value="draft" <?php if ($data['BStatus'] == "draft") {
                                                                        echo "selected";
                                                                    } ?>>Draft</option>

                                        </select>

                                    </div>

                                </div>


                            </div>
                            <hr>
                            <div class="row justify-content-end">
                                <div class="col-3">
                                    <div class="adm-form-hed  mb-20">
                                        <input class="form-control btn btn-success" name="edit_brand" type="submit" value="Save">
                                    </div>
                                </div>
                            </div>
                        </form>
                <?php
                    } else {
                        echo "<div class=\"alert alert-danger alert-dismissable\" role=\"alert\">No Category Selected</div>";
                    }
                } else {
                    echo "id missing from request";
                }
                ?>

            </div>

        </div>
    </div>
    <script src="./vendors/scripts/ckeditor"></script>

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

    
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        <?php if (isset($_SESSION['message'])) { ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("<?= $_SESSION['message']; ?>");
        <?php    }
        unset($_SESSION['message']);
        ?>
    </script>

</body>

</html>