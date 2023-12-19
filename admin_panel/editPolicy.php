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

</head>

<body>
    <?php
    //   include headers 
    include("header.php");
    ?>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="adm-form-hed">
                            <h2> Add Policy</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $policy = getById("policy", "id", $id);
                    if (mysqli_num_rows($policy) > 0) {
                        $data = mysqli_fetch_array($policy);
                ?>
                        <form action="policy.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value=<?= $data['id'] ?> name="id" class="form-control">

                            <div class="row">

                                <div class="col-12 col-lg-9">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cat-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="cat-title" name="Title" value="<?= $data['Title'] ?>">
                                        <span class="d-none">for validation</span>
                                    </div>



                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-dis" class="form-label">Discription</label>

                                        <textarea class="form-control" id="editor1" name="Discription"><?= $data['Discription'] ?> </textarea>
                                        <span class="d-none">for validation</span>
                                    </div>




                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="inp-txt pd-20 mb-20 card-box">
                                        <label for="cate-satus" class="form-label">Status</label>

                                        <select class="form-control" id="cate-satus" name="Status">
                                            <option value="active" <?php if ($data['Status'] == "active") {
                                                                        echo "selected";
                                                                    } ?>>Active</option>
                                            <option value="draft" <?php if ($data['Status'] == "draft") {
                                                                        echo "selected";
                                                                    } ?>>Draft</option>
                                        </select>
                                        <span class="d-none">for validation</span>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row justify-content-end">
                                <div class="col-3">
                                    <div class="adm-form-hed  mb-20">
                                        <input class="form-control btn btn-success" type="submit" name="edit_policy" value="Save">
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