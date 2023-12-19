<?php
require('connect.php');

include 'myfuncations.php';

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
                            <h2> Edit Categories</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <?php
                if (isset($_GET['c_id'])) {
                    $c_id = $_GET['c_id'];
                    $category = getById("categories", "c_id", $c_id);
                    if (mysqli_num_rows($category) > 0) {
                        $data = mysqli_fetch_array($category);
                ?>
                        <form action="categories.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value=<?= $data['c_id'] ?> name="c_id" class="form-control">
                            <div class="row">

                                <div class="col-12 col-lg-9">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cat-title" class="form-label">Title</label>
                                        <input type="text" value=<?= $data['CTitle'] ?> name="CTitle" class="form-control" id="cat-title">
                                        <span class="d-none">for validation</span>
                                    </div>



                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-dis" class="form-label">Discription</label>

                                        <textarea class="form-control" id="editor1" name="CDiscription"><?= $data['CDiscription'] ?>   </textarea>
                                        <span class="d-none">for validation</span>
                                    </div>



                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-img" class="form-label">Image</label>
                                        <input type="file" name="CImage" value="<?= $data['CImage'] ?>  " class="form-control" id="cate-img">
                                        <label for="cate-img" class="form-label">Current Image</label>
                                        <input  type="hidden" name="old_image" value="<?= $data['CImage'] ?>">
                                        <img class="img" src="../uploads/category/<?= $data['CImage'] ?>" alt="">
                                        <span class="d-none">for validation</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-satus" class="form-label">Status</label>

                                        <select class="form-control" name="CStatus" id="cate-satus">

                                            <option value="Active" <?php if ($data['CStatus'] == "Active") {
                                                                        echo "selected";
                                                                    } ?>>Active</option>
                                            <option value="Draft" <?php if ($data['CStatus'] == "Draft") {
                                                                        echo "selected";
                                                                    } ?>>Draft</option>
                                        </select>

                                    </div>
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-popolat" class="form-label"><input type="checkbox" <?php if ($data['CPopular'] == "1") {
                                                                                                                echo "checked";
                                                                                                            } ?> name="CPopular" id=""> Popular</label>
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <div class="row justify-content-end">
                                <div class="col-3">
                                    <div class="adm-form-hed  mb-20">
                                        <input class="form-control btn btn-success" name="edit_categories" type="submit" value="Save">
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

</body>

</html>