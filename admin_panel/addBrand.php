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
                            <h2> Add Brand</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <form action="Brand.php" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cat-title" class="form-label">Title</label>
                                <input type="text" class="form-control Title" name="BTitle" id="cat-title">
                                <span class="error" id="brandTitle-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-dis" class="form-label">Discription</label>
                                <textarea class="form-control Discription" id="editor1" name="BDiscription"> </textarea>
                                <span class="error" id="brandDiscription-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" class="form-control Image" name="BImage" id="cate-img">
                                <span class="error" id="brandImage-error"></span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-satus" class="form-label">Status</label>
                                <select class="form-control Status" id="cate-satus" name="BStatus">
                                    <option value="active">Active</option>
                                    <option value="draft">Draft</option>
                                </select>
                                <span class="error" id="brandStatus-error"></span>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" type="submit" id="submit" name="add_Brand" value="Save" onclick="func()">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function func() {
            console.log('document.getElementById().value', document.getElementsByClassName('Discription'))
            if (document.getElementById('editor1').value == '') {
                alert('Fill Detail')
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $('#brandTitle-error').hide();
            $('#brandDiscription-error').hide();
            $('#brandImage-error').hide();
            $('#brandStatus-error').hide();

            var title_error = true;
            var discription_error = true;
            var image_error = true;
            var status_error = true;

            $(".Title").blur(function() {
                check_Title();
            });
            $(".Discription").blur(function() {
                check_Discription();
            });
            $(".Image").blur(function() {
                check_Image();
            });
            $(".Status").blur(function() {
                check_Status();
            });



            function check_Title() {
                var title_val = $('.Title').val();
                if (title_val == '') {
                    $('#brandTitle-error').show();
                    $('#brandTitle-error').html("*Please Enter Title!");
                    title_error = false;
                    return false;
                } else {
                    $('#brandTitle-error').hide();
                    title_error = true;
                }
            }

            function check_Discription() {
                var discription_val = $('.Discription').val();
                if (discription_val == '' || discription_val == null) {
                    $('#brandDiscription-error').show();
                    $('#brandDiscription-error').html("*Please Enter Discription!");
                    discription_error = false;
                    return false;
                } else {
                    $('#brandDiscription-error').hide();
                    discription_error = true;
                }
            }


            function check_Image() {
                var image_val = $('.Image').val();
                if (image_val == '') {
                    $('#brandImage-error').show();
                    $('#brandImage-error').html("*Please Select Image!");
                    image_error = false;
                    return false;
                } else {
                    $('#brandImage-error').hide();
                    image_error = true;
                }
            }

            function check_Status() {
                var status_val = $('.Status').val();
                if (status_val == '') {
                    $('#brandStatus-error').show();
                    $('#brandStatus-error').html("*Please Select Status!");
                    status_error = false;
                    return false;
                } else {
                    $('#brandStatus-error').hide();
                    status_error = true;
                }
            }


            $('#submit').click(function() {
                title_error = true;
                discription_error = true;
                image_error = true;
                status_error = true;

                check_Title();
                check_Discription();
                check_Image();
                check_Status();

                if (title_error == true && discription_error == true && image_error == true && status_error == true) {
                    return true;
                } else {
                    return false;
                }
            });

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