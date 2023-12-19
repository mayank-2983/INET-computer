<?php
include "connect.php";
session_start();

if((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
    
    if(isset($_POST['payment_id']) ){
        $payment_id= $_POST['payment_id'];
        $name = $_POST['name'];
        $Tprce = $_POST['Tprce'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pincode = $_POST['pin'];
        $country = $_POST['contry'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $pid = $_POST['pid'];

        
        $tracking_no = "INET" . rand(1111, 9999) . substr($phone, 2);
        $u_id = "";
        if (isset($_COOKIE['u_id'])) {
            $u_id = $_COOKIE['u_id'];
        } else {
            $u_id = $_SESSION['u_id'];
        }
        $payment_mode = "Online Payment";

        $insert_query = "INSERT INTO `orders`(`tracking_no`, `u_id`, `name`, `email`, `phone`, `country_id`, `state_id`, `city_id`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`)VALUES ('$tracking_no','$u_id','$name','$email','$phone','$country','$state','$city','$address','$pincode','$Tprce','$payment_mode','$payment_id')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($con);

            if(isset($_POST['placeOrder'])){
                $i = "";
                $pro_id = $pid;
                $pro_id = explode(",", $pro_id);
                $count = count($pro_id) - 1;

                for ($i = 0; $i < $count; $i++) {

                    $product_fetch = mysqli_query($con, "SELECT * FROM `product` WHERE p_id = $pro_id[$i] ");
                    $cart = mysqli_fetch_array($product_fetch);

                    $product_id = $cart['p_id'];
                    $qty = 1;
                    $price = $cart['Price'];

                    $insert_item_query = "INSERT INTO `order_items`(`order_id`, `product_id`, `qty`, `price`) VALUES ('$order_id','$product_id','$qty','$price')";

                    $insert_item_query_run = mysqli_query($con, $insert_item_query);

                    $product_query = "SELECT * FROM `product` WHERE `p_id` = '$product_id' LIMIT 1 ";
                    $product_query_run = mysqli_query($con, $product_query);

                    $product_data = mysqli_fetch_array($product_query_run);
                    $current_qty = $product_data['QTY'];

                    $new_qty = $current_qty - $qty;

                    $update_product = "UPDATE `product` SET `QTY`='$new_qty' WHERE `p_id` = '$product_id'";
                    $update_product_run =  mysqli_query($con, $update_product);
                }

                $deleteCartQuery = "DELETE FROM `custom_product` WHERE `u_id` =  '$u_id'";
                $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            }else{

            
                $cart = mysqli_query($con, "SELECT * from user, carts, product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.p_id = carts.p_id AND  carts.u_id = user.u_id AND carts.u_id='$u_id' ");

                while ($c = mysqli_fetch_array($cart)) {
                    $product_id = $c['p_id'];
                    $qty = $c['cart_qty'];
                    $price = $c['Price'];

                    $insert_item_query = "INSERT INTO `order_items`(`order_id`, `product_id`, `qty`, `price`) VALUES ('$order_id','$product_id','$qty','$price')";

                    $insert_item_query_run = mysqli_query($con, $insert_item_query);

                    $product_query = "SELECT * FROM `product` WHERE `p_id` = '$product_id' LIMIT 1 ";
                    $product_query_run = mysqli_query($con, $product_query);

                    $product_data = mysqli_fetch_array($product_query_run);
                    $current_qty = $product_data['QTY'];

                    $new_qty = $current_qty - $qty;


                    $update_product = "UPDATE `product` SET `QTY`='$new_qty' WHERE `p_id` = '$product_id'";
                    $update_product_run =  mysqli_query($con, $update_product);
                }
                $deleteCartQuery = "DELETE FROM `carts` WHERE `u_id` = '$u_id'";
                $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            }

            header("location: index.php");

        }
    }
} else {
    header("Location:login.php");
}




?>