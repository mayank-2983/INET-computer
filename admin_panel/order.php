<?php
    include "connect.php";
    if (isset($_POST['update-order'])) {
        $tracking_no = $_POST['tracking_no'];
        $order_status = $_POST['order_status'];

        $updateOrder_query = "UPDATE `orders` SET `status`='$order_status' WHERE `tracking_no`='$tracking_no'";
        $result = mysqli_query($con, $updateOrder_query);

        if ($result) {
            header("Location:viewOrder.php");
        }
    }else{
        echo "No update";
    }
?>