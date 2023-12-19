<?php 
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .fullDivForm {
            min-width: 100vw;
            min-height: 100vh;
            background: #8e9eab;
            background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);
            background: linear-gradient(to right, #8e9eab, #eef2f3);
        }

        .loginHead {
            font-weight: 300;
            font-family: sans-serif;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid rgb(157, 200, 237);
            border-radius: 0;
            outline: none;
            padding-left: 60px !important;
        }

        .form-control:focus {
            outline: none !important;
            box-shadow: none;
        }

        .error{
            color:red
        }
        @media screen and (max-width : 570px){
            .container{
                padding-top: 0 !important;
            }
            .firstDivImg{
                border-right: none;
            }
        }
    </style>
</head>

<body>
    <section class="fullDivForm">
        <div class="container pt-5">
            <div class="row" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                <div class="col-md-5 m-0 p-4 firstDivImg" style="background-color: white;border-right: 3px solid gray;">
                    <div class="d-flex justify-content-center p-3">
                        <img src="./vendors/images/adminLoginImage.jpg" alt="loginImage"
                            style="height: 100%;width: 100%;">
                    </div>
                </div>
                <div class="col-md-7 p-5 bg-light">
                    <form id="adminForm" action="./code.php" method="POST">
                        <h1 class="mb-3 loginHeadc text-center"><img src="./vendors/images/InetIcon.jpg" alt="icon" height="70"
                                width="70"> Admin Log In</h1>
                            <hr>

                        <div class="form-floating mb-3 mt-5">
                            <label>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </label>
                            <input type="email" class="form-control" name="Email" id="Email"
                                placeholder="name@example.com">
                            <label for="Email" class="lbl ms-5">Email address</label>
                            <span class="error" id="Emailerr"></span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </label>
                            <input type="password" class="form-control" name="Password" id="Password"
                                placeholder="Password">
                            <label for="Password" class="ms-5">Password</label>
                            <span class="error" id="Passworderr"></span>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn  p-3 text-light fw-bold" type="submit" name="login"
                                style="background-color: rgb(29, 128, 214);">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $('.error').hide()
            $("#adminForm").validate({
                rules: {
                    Email: {
                        required: true
                    },
                    Password: {
                        required: true
                    }

                },
                messages:{
                    Email: {
                        required: 'Email is Required'
                    },
                    Password: {
                        required: 'Password is Required'
                    }
                },
                onfocusout: function (element) {
                    $(element).valid();
                },
                errorPlacement: function (error, element) {
                    $('.error').show()
                    switch (element.attr("name")) {
                        case "Email":
                            error.appendTo("#Emailerr");
                            break;
                        case "Password":
                            error.appendTo("#Passworderr");
                            break;
                       
                    }
                }
            })
        })
    </script>

</body>

</html>

<!-- box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); -->
<!-- background: linear-gradient(90deg, #00c9ff, #92fe9d); -->