<?php
    include "connect.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                            <h2> Add Contains</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <form action="about.php" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cat-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="cat-title"  name="Title">
                                <span class="d-none">for validation</span>
                            </div>



                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-dis" class="form-label">Discription</label>

                                <textarea class="form-control" id="editor1" name="Discription"> </textarea>
                                <span class="d-none">for validation</span>
                            </div>



                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" class="form-control" id="cate-img"  name="Image">
                                <span class="d-none">for validation</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <div class="form-check">
                                    <input class="form-check-input" name="column" type="checkbox"  id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        column reverse
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" type="submit" name="add-about" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
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