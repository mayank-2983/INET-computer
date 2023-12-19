<?php
session_start();

include("connect.php");
if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))) {
    $user_id = "";
    if (isset($_COOKIE['u_id'])) {
        $user_id = $_COOKIE['u_id'];
    } else {
        $user_id = $_SESSION['u_id'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/base.css">
        <!-- alertify -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <!-- bootstap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- icons  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- swiper  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

        <title>Inet Conputer | checkout</title>

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
            .crt-tabl td {
                vertical-align: middle;
            }

            .crt-tabl tr td img {
                width: 85px;
            }

            .crt-brd {
                border-radius: 10px;
                border: 1px solid rgb(224 223 223);
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            }

            .crt-total {
                display: flex;
                justify-content: space-between;
            }

            .error {
                color: red;
            }
        </style>
    </head>

    <body>

        <header>
            <?php
            include("header1.php");
            ?>
        </header>
        <div class="all-page-title a-banner">
        <?php
                    $apl = mysqli_query($con, "SELECT * FROM `all_page_banner` LIMIT 1");
                    $img = mysqli_fetch_array($apl);
                ?>

                    <img height="100px" src="./uploads/all_page_banner/<?= $img['Image'] ?>" alt="">
            <div class="a-banner-caption">
                <div class="r row">
                    <div class="col-sm-12 col c">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <section class="cart-page">
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart-head mb-5">
                                <h3>Shopping Cart</h3>
                            </div>
                        </div>
                    </div>
                    <form action="handelcheckout.php" method="POST" id="checkoutForm">
                        <div class="row   p-5 crt-brd m-md-0 m-2">

                            <div class="col-12 col-md-7">
                                <div class="crt-hed">
                                    <h3>Basic Details</h3>

                                    <hr>
                                </div>
                                <div class="cart-frm">

                                    <div class="row">
                                        <div class="col-6  mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="crt-name">Name: </label>
                                                <input type="text" name="Name" class="form-control" id="crt-name"
                                                    placeholder="Name">
                                                <span class="error" id="Name-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="crt-email">Email: </label>
                                                <input type="email" name="Email" class="form-control" id="crt-email"
                                                    placeholder="Email">
                                                <span class="error" id="Email-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="crt-phone">Phone: </label>
                                                <input type="number" name="Phone" name="Phone" class="form-control"
                                                    id="crt-phone" placeholder="Phone">
                                                <span class="error" id="Phone-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="crt-pincode">Pincode: </label>
                                                <input type="number" name="Pincode" class="form-control" id="crt-pincode"
                                                    placeholder="Pincode">
                                                <span class="error" id="Pincode-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="HomeCountry ">Country: </label>
                                                <select class="form-control" name="Country" id="HomeCountry">
                                                    <option value="">-- Select Country --</option>
                                                    <?php

                                                    $result1 = mysqli_query($con, "SELECT * FROM countries");
                                                    while ($row = mysqli_fetch_array($result1)) {
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["name"]; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="error" id="Country-error"></span>
                                            </div>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="HomeState">State: </label>
                                                <select class="form-control" name="State" id="HomeState">
                                                    <option value="">-- Select State --</option>
                                                </select>
                                                <span class="error" id="State-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <div class="cart-frm-inp">
                                                <label for="HomeCity">City: </label>
                                                <select class="form-control" id="HomeCity" name="City">
                                                    <option value="">-- Select City --</option>
                                                </select>
                                                <span class="error" id="City-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="cart-frm-inp">
                                                <label for="crt-add">Address: </label>
                                                <textarea class="form-control" name="Address" id="crt-add"></textarea>
                                                <span class="error" id="Address-error"></span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-5 mt-5 mt-md-0">
                                <div class="crt-hed">
                                    <h3>order Details</h3>

                                    <hr>
                                </div>
                                <?php
                                    if(isset($_GET['p_id'])){
                                ?>
                                    <div class="crt-tabl">
                                    <table class="table">

                                    <?php
                                        $pid = $_GET['p_id'];


                                        $sql = "SELECT * FROM `custom_product` WHERE u_id = '$user_id' AND products_id = '$pid'";
                                        $result = mysqli_query($con, $sql);
                                    
                                        
                                        $product = mysqli_fetch_array($result);
                                        $i = "";
                                        $pro_id = $product['products_id'];
                                        $pro_id = explode(",", $pro_id);
                                        $count = count($pro_id) - 1;
                                        $total = "";
                                        $qty = "";
                                        
                                        for ($i = 0; $i < $count; $i++) {

                                            $product_fetch = mysqli_query($con, "SELECT * FROM `product` WHERE p_id = $pro_id[$i] ");
                                            $cart = mysqli_fetch_array($product_fetch);

                                                $res = $cart['PImage'];
                                                $res = explode(",", $res);



                                    ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="#">
                                                            <img src="<?php echo 'uploads/products/' . $res[0]; ?>" alt="" />
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="cart-p-title">
                                                            <h5>
                                                                <?= $cart['Title'] ?>
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="crt-p-price">
                                                            <h5>
                                                                <?= $cart['SellPrice'].'.00' ?>
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>



                                                <?php
                                                $total = $product['discount_price'];
                                                
                                            }
                                        
                                        ?>





                                    </table>
                                    <div class="crt-total ">

                                        <h5>Total Price:</h5>

                                        <h5>
                                            <?= $total ?>.00
                                        </h5>
                                        <input type="hidden" name="cust_p_price" value="<?= $total ?>" id="Tprice">

                                    </div>

                                    <div class="btn-cod mt-2">
                                        <input type="hidden" name="cust_p_id" value="<?= $pid ?>" id="pid">
                                        <input type="hidden" value="custom_product" id="placeOrder">
                                        <button type="submit" name="PlaceOrder_cust_pro" class="btn btn-primary w-100">Confirm and
                                            Place Order | COD</button>
                                        <button id="rzp-button1" class="btn btn-warning mt-3 w-100">Online Payment</button>


                                    </div>

                                </div>
                                <?php
                                    }else{

                                ?>
                                <div class="crt-tabl">
                                    <table class="table">

                                        <?php
                                        

                                       

                                        
                                        $sql = "SELECT * from user, carts, product where product.p_id = carts.p_id AND  carts.u_id = user.u_id AND carts.u_id='$user_id' ";
                                        
                                        $view_cart = mysqli_query($con, $sql);
                                        $sum = 0;

                                        if (mysqli_num_rows($view_cart) == 0) {
                                            echo "
                                            <script>
                                                
                                                window.location.href = 'index.php';
                                            </script>
                                        ";
                                        } else {
                                            while ($cart = mysqli_fetch_array($view_cart)) {

                                                $res = $cart['PImage'];
                                                $res = explode(",", $res);



                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="#">
                                                            <img src="<?php echo 'uploads/products/' . $res[0]; ?>" alt="" />
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="cart-p-title">
                                                            <h5>
                                                                <?= $cart['Title'] ?>
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="crt-p-price">
                                                            <h5>
                                                                <?= $cart['SellPrice'] ?>
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-p-qty">
                                                            <h5>x
                                                                <?php
                                                                
                                                                
                                                                    $qty = $cart['cart_qty'];
                                                                
                                                                echo $qty;
                                                                ?>
                                                            </h5>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <?php
                                                $total = $cart['SellPrice'] * $qty;
                                                $sum += $total;
                                            }
                                        }
                                        ?>





                                    </table>
                                    <div class="crt-total ">

                                        <h5>Total Price:</h5>

                                        <h5>
                                            <?= $sum ?>.00
                                        </h5>
                                        <input type="hidden" value="<?= $sum ?>" id="Tprice">

                                    </div>

                                    <div class="btn-cod mt-2">


                                        <button type="submit" name="PlaceOrderBtn" class="btn btn-primary w-100">Confirm and
                                            Place Order | COD</button>
                                        <button id="rzp-button1" class="btn btn-warning mt-3 w-100">Online Payment</button>


                                    </div>

                                </div>
                            
                                <?php 
                                    }
                                ?>
                            </div>

                        </div>
                    </form>
                </div>
            </section>


        </div>


        <script>
            $(document).ready(function () {
                $('.error').hide()
                $("#checkoutForm").validate({
                    rules: {
                        Name: {
                            required: true
                        },
                        Email: {
                            required: true
                        },
                        Phone: {
                            required: true
                        },
                        Pincode: {
                            required: true,
                            minlength: 6,
                            maxlength: 6,
                        },
                        Country: {
                            required: true
                        },
                        State: {
                            required: true
                        },
                        City: {
                            required: true
                        },
                        Address: {
                            required: true
                        },
                    },
                    messages: {
                        Name: {
                            required: 'Name is Required'
                        },
                        Email: {
                            required: 'Email is Required'
                        },
                        Phone: {
                            required: 'Phone No. is Required'
                        },
                        Pincode: {
                            required: 'Pincode is Required',
                            minlength: 'Pincode min length is 6',
                            maxlength: 'Pincode max length is 6',
                        },
                        Country: {
                            required: 'Country is Required'
                        },
                        State: {
                            required: 'State is Required'
                        },
                        City: {
                            required: 'City is Required'
                        },
                        Address: {
                            required: 'Address is Required'
                        },
                    },
                    onfocusout: function (element) {
                        $(element).valid();
                    },
                    errorPlacement: function (error, element) {
                        $('.error').show()
                        switch (element.attr("name")) {
                            case "Name":
                                error.appendTo("#Name-error");
                                break;
                            case "Email":
                                error.appendTo("#Email-error");
                                break;
                            case "Phone":
                                error.appendTo("#Phone-error");
                                break;
                            case "Pincode":
                                error.appendTo("#Pincode-error");
                                break;
                            case "Country":
                                error.appendTo("#Country-error");
                                break;
                            case "State":
                                error.appendTo("#State-error");
                                break;
                            case "City":
                                error.appendTo("#City-error");
                                break;
                            case "Address":
                                error.appendTo("#Address-error");
                                break;
                        }
                    }
                })
            })
        </script>

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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="script.js"></script>

    <script>
        $(document).ready(function () {

            document.getElementById('rzp-button1').onclick = function (e) {
                e.preventDefault();
                var name = $("#crt-name").val();
                var Tprce = Math.floor( $("#Tprice").val());
                var email = $("#crt-email").val();
                var phone = $("#crt-phone").val();
                var pin = $("#crt-phone").val();
                var contry = $("#HomeCountry").val();
                var state = $("#HomeState").val();
                var city = $("#HomeCity").val();
                var address = $("#crt-add").val();
                var placeOrder = $("#placeOrder").val();
                var pid = $("#pid").val();

                var options = {
                    "key": "rzp_test_eI2S6ZBP9TpkSa", // Enter the Key ID generated from the Dashboard
                    "amount": Tprce * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Acme Corp", //your business name
                    "description": "Test Transaction",
                    "image": "./img/logo/logo.png",
                    

                    "handler": function (response) {
                        $.ajax({
                            type: "POST",
                            url: "payment_process.php",
                            data: {
                                "pid": pid,
                                "placeOrder": placeOrder,
                                "name": name,
                                "Tprce": Tprce,
                                "email": email,
                                "phone": phone,
                                "pin": pin,
                                "contry": contry,
                                "state": state,
                                "city": city,
                                "address": address,
                                "payment_id": response.razorpay_payment_id
                            },
                            success: function (response) {
                                window.location.href = "myorder.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);

                rzp1.open();

            }


















            $('#HomeCountry').on('change', function () {
                var country_id = this.value;
                $.ajax({
                    url: "states-by-country.php",
                    type: "POST",
                    data: {
                        country_id: country_id
                    },
                    cache: false,
                    success: function (result) {
                        $("#HomeState").html(result);
                        $('#HomeCity').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#HomeState').on('change', function () {
                var state_id = this.value;
                $.ajax({
                    url: "cities-by-state.php",
                    type: "POST",
                    data: {
                        state_id: state_id
                    },
                    cache: false,
                    success: function (result) {
                        $("#HomeCity").html(result);
                    }
                });
            });
        });
    </script>

    </html>
    <?php
} else {
    header("location: login.php");
}
?>