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
    //   include headers 
    include("header.php");
    ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="adm-form-hed">
                            <h2> Add Categories</h2>
                        </div>
                    </div>
                </div>

                <hr>
                <form action="categories.php" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cat-title" class="form-label">Title</label>
                                <input type="text" name="CTitle" class="form-control Title" id="cat-title">
                                <span class="error" id="cTitle-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-dis" class="form-label">Discription</label>
                                <textarea class="form-control Discription" id="editor1" name="CDiscription" required> </textarea>
                                <span class="error" id="cDiscription-error"></span>
                            </div>

                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-img" class="form-label">Image</label>
                                <input type="file" name="CImage" class="form-control Image" id="cate-img">
                                <span class="error" id="cImage-error"></span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-satus" class="form-label">Status</label>
                                <select class="form-control Status" name="CStatus" id="cate-satus">
                                    <option value="">select</option>
                                    <option value="Active">Active</option>
                                    <option value="Draft">Draft</option>
                                </select>
                                <span class="error" id="cStatus-error"></span>
                            </div>
                            <div class="inp-txt pd-20 mb-20 card-box">
                                <label for="cate-popolat" class="form-label"><input type="checkbox" name="CPopular" id=""> Popular</label>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div class="adm-form-hed  mb-20">
                                <input class="form-control btn btn-success" name="add_categories" id="submit" type="submit" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#cTitle-error').hide();
            $('#cDiscription-error').hide();
            $('#cImage-error').hide();
            $('#cStatus-error').hide();

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
                    $('#cTitle-error').show();
                    $('#cTitle-error').html("*Please Enter Title!");
                    title_error = false;
                    return false;
                } else {
                    $('#cTitle-error').hide();
                    title_error = true;
                }
            }

            function check_Discription() {
                var discription_val = $('.Discription').val();
                if (discription_val == '') {
                    $('#cDiscription-error').show();
                    $('#cDiscription-error').html("*Please Enter Discription!");
                    discription_error = false;
                    return false;
                } else {
                    $('#cDiscription-error').hide();
                    discription_error = true;
                }
            }


            function check_Image() {
                var image_val = $('.Image').val();
                if (image_val == '') {
                    $('#cImage-error').show();
                    $('#cImage-error').html("*Please Select Image!");
                    image_error = false;
                    return false;
                } else {
                    $('#cImage-error').hide();
                    image_error = true;
                }
            }

            function check_Status() {
                var status_val = $('.Status').val();
                if (status_val == '') {
                    $('#cStatus-error').show();
                    $('#cStatus-error').html("*Please Select Status!");
                    status_error = false;
                    return false;
                } else {
                    $('#cStatus-error').hide();
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