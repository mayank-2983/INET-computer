<?php
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/animate.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <title>Inet Conputer</title>

<!-- Site favicon -->
<link
rel="apple-touch-icon"
sizes="180x180"
href="img/favicon/apple-touch-icon.png"
/>
<link
rel="icon"
type="image/png"
sizes="32x32"
href="img/favicon/favicon-32x32.png"
/>
<link
rel="icon"
type="image/png"
sizes="16x16"
href="img/favicon/favicon-16x16.png"
/>

    <style>
        .error .error {
            color: red;
        }
    </style>

</head>

<body>
    <header>
        <?php
        //   include headers 
        include("header1.php");
        ?>
    </header>
    <section class="all-page-title a-banner">
        <?php
        $apl = mysqli_query($con, "SELECT * FROM `all_page_banner` LIMIT 1");
        $img = mysqli_fetch_array($apl);
        ?>

        <img height="100px" src="./uploads/all_page_banner/<?= $img['Image'] ?>" alt="">
        <div class="a-banner-caption">
            <div class="r row">
                <div class="col-sm-12 col c">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Registration</li>
                    </ul>
                    <h1>Registration</h1>
                </div>
            </div>
        </div>
    </section>



    <div class="auth-page-content mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card mt-5 login-bg">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <?php
                                $sel_logo = mysqli_query($con, "SELECT * FROM `logo` limit 1");
                                $log_arr = mysqli_fetch_array($sel_logo);
                                ?>
                                <div class="d-inline-block auth-logo">
                                    <img src="uploads/logo/<?= $log_arr['Image'] ?>" alt="Inet logo" height="120" />
                                </div>
                                <h3 class="text-dark mt-3">Create Your Account</h3>
                            </div>

                            <form method="post" id="register" action="login_register.php" class="p-2 mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="FirstName" class="form-label">First Name</label>
                                            <input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="Enter First Name" />
                                            <span class="error" id="FirstName-error"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="LastName" class="form-label">Last Name</label>
                                            <input type="text" name="LastName" id="LastName" class="form-control" placeholder="Enter Last Name" />
                                            <span class="error" id="LastName-error"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="EmailAddress" class="form-label">Email</label>
                                            <input type="email" name="EmailAddress" id="EmailAddress" class="form-control" placeholder="Enter Email" />
                                            <span class="error" id="EmailAddress-error"></span>
                                        </div>




                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="UserName" class="form-label">User Name</label>
                                            <input type="text" name="UserName" id="UserName" class="form-control" placeholder="Enter User Name" />
                                            <span class="error" id="UserName-error"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Password" class="form-label">Password</label>
                                            <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Password" />
                                            <span class="error" id="Password-error"></span>
                                        </div>

                                        <div class="form-check mt-5">
                                            <input type="checkbox" required class="form-check-input checked" name="check" id="exampleCheck1">
                                            <label class="form-check-label fw-bold" for="exampleCheck1"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                                            <b><span class="spancheck"></span></b>

                                        </div>



                                    </div>
                                </div>


                                <div class="mt-4">
                                    <input type="submit" name="Registration" value="Create" class="btn btn-primary w-100" />
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>






    <footer>
        <?php
        //  include footer 
        include("footer.php")
        ?>
    </footer>
    <div class="copy-rights">
        <p>
            © 2023 inetCom. Powered by Inet Computer.</p>
    </div>
</body>

<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- jquery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>


<!-- Isotop plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.error').hide()
        $(function() {
            var $registerForm = $("#register");

            $registerForm.validate({
                rules: {
                    FirstName: {
                        required: true,
                        lattersonly: true
                    },
                    LastName: {
                        required: true,
                        lattersonly: true
                    },
                    EmailAddress: {
                        required: true,
                        email: true
                    },
                    UserName: {
                        required: true,
                    },
                    Password: {
                        required: true,
                        minlength: 8,
                        all: true
                    },
                    PasswordConfirm: {
                        required: true,
                        equalTo: '#Password'
                    },
                },
                messages: {
                    FirstName: {
                        required: 'FirstName is Required',
                        lattersonly: 'Enter only Latters in FirstName'
                    },
                    LastName: {
                        required: 'LastName is Required',
                        lattersonly: 'Enter only Latters LastName'
                    },
                    EmailAddress: {
                        required: 'EmailAddress is Required',
                        email: 'EmailAddress invalid'
                    },
                    UserName: {
                        required: 'UserName is Required',
                    },
                    Password: {
                        required: 'Password is Required',
                        minlength: 'Password minlength is 8',
                        all: 'Space is not allowed'
                    },
                    PasswordConfirm: {
                        required: 'PasswordConfirm is Required',
                        equalTo: 'Password not Match'
                    },
                },
                onfocusout: function(element) {
                    $(element).valid();
                },
                errorPlacement: function(error, element) {
                    $('.error').show()
                    switch (element.attr("name")) {
                        case "FirstName":
                            error.appendTo("#FirstName-error");
                            break;
                        case "LastName":
                            error.appendTo("#LastName-error");
                            break;
                        case "EmailAddress":
                            error.appendTo("#EmailAddress-error");
                            break;
                        case "UserName":
                            error.appendTo("#UserName-error");
                            break;
                        case "Password":
                            error.appendTo("#Password-error");
                            break;
                        case "PasswordConfirm":
                            error.appendTo("#PasswordConfirm-error");
                            break;
                    }
                }
            })

            jQuery.validator.addMethod('lattersonly', function(value, element) {
                return /^[^-\s][a-zA-Z_\s-]+$/.test(value);
            });

            jQuery.validator.addMethod('numbersonly', function(value, element) {
                return /^[^-\s][0-9]+$/.test(value);
            });

            jQuery.validator.addMethod('all', function(value, element) {
                return /^[^-\s][a-zA-Z0-9_\s-]+$/.test(value);
            });
        })

    })
</script>

</html>