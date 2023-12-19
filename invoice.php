
<?php

 session_start();
            if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
                $u_id = "";
                if(isset($_COOKIE['u_id'])){
                    $u_id = $_COOKIE['u_id'];
                }else{
                    $u_id = $_SESSION['u_id'];
                }
                
        
                include "connect.php";





if (isset($_GET['tracking_no']) && $_GET['o_id']) {

$tracking = $_GET['tracking_no'];
$o_id = $_GET['o_id'];

$sql = "SELECT * FROM `orders` WHERE `tracking_no` = '$tracking' AND `id` = '$o_id'";
$sql_run = mysqli_query($con,$sql);
$user_data = mysqli_fetch_array($sql_run);
$name = $user_data['name'];
$email = $user_data['email'];
$phone = $user_data['phone'];
$tracking_no = $user_data['tracking_no'];
$payment_mode = $user_data['payment_mode'];
$p = $user_data['total_price'];

$c_id = $user_data['country_id'];
$countries = mysqli_query($con, "SELECT name FROM `countries` WHERE id = $c_id");
$country = mysqli_fetch_array($countries);
$s_id = $user_data['state_id'];
$state = mysqli_query($con, "SELECT name FROM `states` WHERE id = $s_id");
$state_name = mysqli_fetch_array($state);
$city_id = $user_data['city_id'];
$city = mysqli_query($con, "SELECT name FROM `cities` WHERE id = $city_id");
$city_name = mysqli_fetch_array($city);

$address = $user_data['address'];
$pin = $user_data['pincode'];


$sel_logo = mysqli_query($con,"SELECT * FROM `logo` limit 1");
$log_arr=mysqli_fetch_array($sel_logo);
            
$logo = $log_arr['Image']; 

 
$cont_qry=mysqli_query($con,"SELECT * FROM store_detail");
$cont_arr =mysqli_fetch_array($cont_qry);
$add = $cont_arr['Address'];               
 


require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

 
            $sel_logo = mysqli_query($con,"SELECT * FROM `logo` limit 1");
            $log_arr=mysqli_fetch_array($sel_logo);
            $logo = $log_arr['Image'];
$html='<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
      * {
        box-sizing: border-box;
      }

      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        word-break: break-all;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 16px;
      }
      .h4-14 h4 {
        font-size: 12px;
        margin-top: 0;
        margin-bottom: 5px;
      }
      .img {
        margin-left: "auto";
        margin-top: "auto";
        height: 30px;
      }
      pre,
      p {
        /* width: 99%; */
        /* overflow: auto; */
        /* bpicklist: 1px solid #aaa; */
        padding: 0;
        margin: 0;
      }
      table {
        font-family: arial, sans-serif;
        width: 100%;
        border-collapse: collapse;
        padding: 1px;
      }
      .hm-p p {
        text-align: left;
        padding: 1px;
        padding: 5px 4px;
      }
      td,
      th {
        text-align: left;
        padding: 8px 6px;
      }
      .table-b td,
      .table-b th {
        border: 1px solid #ddd;
      }
      th {
        /* background-color: #ddd; */
      }
      .hm-p td,
      .hm-p th {
        padding: 3px 0px;
      }
      .cropped {
        float: right;
        margin-bottom: 20px;
        height: 100px; /* height of container */
        overflow: hidden;
      }
      .cropped img {
        width: 400px;
        margin: 8px 0px 0px 80px;
      }
      .main-pd-wrapper {
        box-shadow: 0 0 10px #ddd;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
      }
      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
      }
      .invoice-items {
        font-size: 14px;
        border-top: 1px dashed #ddd;
      }
      .invoice-items td{
        padding: 14px 0;
       
      }
    </style>
  </head>
  <body>
    <section class="main-pd-wrapper" style="width: 650px; margin: auto">
      <div style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">';

           
               $html.= '<img src="uploads/logo/'.$logo.'" width="120px" alt="" srcset="">';

                $html.='<p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;">
                  Tax Invoice/Bill Of Supply INET<br> Private Limited
                </p>
                <p style="margin: 15px auto;">
                  '.$add.'
                </p>
                <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
                <div style="text-align: start; display: flex;  ">

                    <div>
                        <p>
                            <b>Name:</b>'.$name.'
                          </p>
                          <p>
                            <b>Phone:</b>'.$email.'
                          </p>
                        
                          
                    </div>
                      <div>
                        <p>
                            <b> Email :</b>'.$phone.'
                          </p>
                        <p>
                            <b> Tranking No :</b> '.$tracking_no.'
                        </p>
                        
                          <p>
                            <b> Address:</b> '.$address.','.$city_name[0].','.$state_name[0].','.$country[0].',pin:'.$pin.'
                        </p>
                        
                      </div>
                </div>
                <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
              </div>
              <table style="width: 100%; table-layout: fixed">
                <thead>
                  <tr>
                    <th style="width: 50px; padding-left: 0;">Sn.</th>
                    <th style="width: 220px;">Item Name</th>
                    <th>QTY</th>
                    <th>Unit Price</th>
                    <th style="text-align: right; padding-right: 0;">Total Price</th>
                  </tr>
                </thead>
                <tbody>';

                $product = "SELECT * FROM `orders`,`order_items`,`product` WHERE `order_items`.`order_id`=`orders`.`id` AND `order_items`.`product_id`=`product`.`p_id` AND `tracking_no` = '$tracking_no' AND `u_id` = '$u_id'";
                $order_run = mysqli_query($con,$product);

                if (mysqli_num_rows($order_run) > 0) {
                $i = 0;
                $total_cost = 0;
               

                foreach ($order_run as $items){
                  $qty = $items['qty'];
                  $title = $items['Title'];
                  $Price = $items['Price'];
                  $total = $Price * $qty;
                  
                 
                  $total_cost += $total;
                  $i++;
          $html.='<tr class="invoice-items">
                    <td>'.$i.'.</td>
                    <td >'.$title.'</td>
                    <td>'.$qty.'</td>
                    <td>'.$Price.'</td>
                    <td style="text-align: right;">₹'.$total.'</td>
                  </tr>';
                 
                
                                        }
                                    }
                                
                                
                    $discount = $total_cost - $p;
               

                $html.='</tbody>
              </table>

              <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
                <thead>
                  <tr>
                    <th>Total</th>
                    <th style="text-align: center;">Item ('.$i.')</th>
                    <th>&nbsp;</th>
                    <th style="text-align: right;">₹'.$total_cost.'</th>
                    
                  </tr>
                </thead>
             
              </table>

              <table style="width: 100%;
              margin-top: 15px;
              border: 1px dashed #00cd00;
              border-radius: 3px;">
                <thead>
                  <tr>
                    <td>Total Saving In Rs: </td>
                    <td style="text-align: right;">'.$discount.'</td>
                  </tr>
                  <tr>
                    <td>Total Payed In Rs: </td>
                    <td style="text-align: right;">'.$p.'</td>
                  </tr>
                  <tr>
                    <td>Payment Mode: </td>
                    <td style="text-align: right;">'.$payment_mode.'</td>
                  </tr>
                </thead>
             
              </table>

    </section>
  </body>
</html>


';

// $mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->Output($file,'D');

}else{
  header("Location: 404.php");
}
   
    }else {
       header("Location: login.php");
    }

?>
