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
                
        ?>


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/base.css">
  <!-- bootstap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- swiper  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

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
    .crt-tabl td{
        vertical-align: middle;
    }
    .crt-tabl tr  td img{
        width: 85px;
    }
    .crt-brd{
        border-radius: 10px;
    border: 1px solid rgb(224 223 223);
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .crt-total{
        display: flex;
        justify-content: space-between;
    }
    .form-control:disabled {
    background-color: white !important;
    
    opacity: 1;
}
.bor-2{
    border: 1px solid #80808061;
    border-radius: 5px;
    padding: 5px;
}
    </style>
</head>

<body>
    <header>
        <?php 
             include "header1.php";
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
                            <li>Order Detail</li>
                        </ul>
                        <h1>Order Detail</h1>
                    </div>
                </div>
            </div>
        </div>
    <div class="main">
        <section class="cart-page ">
            <div class="container mb-5">
                
                <?php
                    if (isset($_GET['t'])) {
                        $tracking_no = $_GET['t'];
    
                        $query = "SELECT * FROM `orders` WHERE `tracking_no` = '$tracking_no' AND `u_id` = '$u_id' ";
                        $result = mysqli_query($con,$query);
                        if (mysqli_num_rows($result) < 0) {
                            echo "<h4>Something went wrong</h4>";
                        }else {
                        
                            $data = mysqli_fetch_array($result);
                ?>

                <div class="row   p-5 crt-brd  m-md-0 m-2">
                     
                     <div class=" col-12 col-md-7">
                        <div class="crt-hed">
                            <h3>Besic Details</h3>

                            <hr>
                        </div>
                        
            
                        <div class="cart-frm">
                            <form action="">
                              <div class="row">
                                <div class="col-6  mb-3">
                                    <div class="cart-frm-inp">
                                        <label for="crt-name">Name: </label>
                                        <input type="text" class="form-control" disabled value="<?= $data['name'] ?>" id="crt-name" >
                                    </div>
                                </div>
                                <div class="col-6 mb-3"  >
                                    <div class="cart-frm-inp">
                                        <label for="crt-email">Email: </label>
                                        <input type="email" class="form-control" disabled value="<?= $data['email'] ?>"  id="crt-email" >
                                    </div>
                                </div>
                                <div class="col-6 mb-3"  >
                                    <div class="cart-frm-inp">
                                        <label for="crt-phone">Phone: </label>
                                        <input type="number" class="form-control" disabled value="<?= $data['phone'] ?>"  id="crt-phone" >
                                    </div>
                                </div>
                                <div class="col-6 mb-3"  >
                                    <div class="cart-frm-inp">
                                        <label for="crt-pincode">Pincode: </label>
                                        <input type="number" class="form-control" disabled value="<?= $data['pincode'] ?>"  id="crt-pincode" >
                                    </div>
                                </div>
                                <div class="col-4 mb-3"  >
                                    <div class="cart-frm-inp">
                                        <label for="crt-ctr">Country: </label>
                                            <?php
                                                $c_id = $data['country_id'];
                                                $country = mysqli_query($con,"SELECT * FROM `countries` WHERE `id`='$c_id'");
                                                $carr = mysqli_fetch_array($country);
                                            ?>
                                        <input type="text" class="form-control" id="crt-ctr" disabled value="<?= $carr['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-4 mb-3"  >
                                    <div class="cart-frm-inp">
                                        <label for="crt-st">State: </label>
                                        <?php
                                                $s_id = $data['state_id'];
                                                $states = mysqli_query($con,"SELECT * FROM `states` WHERE `id`='$s_id'");
                                                $sarr = mysqli_fetch_array($states);
                                            ?>
                                        <input type="text" class="form-control" id="crt-st" disabled value="<?= $sarr['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="cart-frm-inp">
                                        <label for="crt-city">City: </label>
                                        <?php
                                                $city_id = $data['city_id'];
                                                $city_sql = mysqli_query($con,"SELECT * FROM `cities` WHERE `id`='$city_id'");
                                                $city = mysqli_fetch_array($city_sql);
                                            ?>
                                        <input type="text" class="form-control" id="crt-city" disabled value="<?= $city['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="cart-frm-inp">
                                        <label for="crt-add">Address: </label>
                                         <textarea class="form-control" name="" disabled id="crt-add" ><?= $data['address'] ?></textarea>
                                    </div>
                                </div>

                              </div>
                            </form>
                        </div>
                     </div>
                     <div class="col-12 col-md-5 mt-5 mt-md-0">
                        <div class="crt-hed">
                            <h3>order Details</h3>

                            <hr>
                        </div>

                        <div class="crt-tabl">
                            <table class="table">
                                <?php 
                                    $product = "SELECT * FROM `orders`,`order_items`,`product` WHERE `order_items`.`order_id`=`orders`.`id` AND `order_items`.`product_id`=`product`.`p_id` AND `tracking_no` = '$tracking_no' AND `u_id` = '$u_id'";
                                    $order_run = mysqli_query($con,$product);

                                    if (mysqli_num_rows($order_run) > 0) {
                                        foreach ($order_run as $items){
                                            $res=$items['PImage'];
                                            $res=explode(",",$res);
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <a href="#">
                                                <img src="uploads/products/<?= $res[0] ?>" alt="" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="cart-p-title">
                                                <h5><?= $items['Title'] ?></h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="crt-p-price">
                                                <h5><?= $items['SellPrice'].'.00' ?></h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-p-qty">
                                                <h5>X  <?= $items['qty'] ?></h5>
                                            </div>
                                        </td>
                                    </tr>
                               
                                <?php
                                        }
                                    }
                                
                                
                                ?>
                                

                                
                                 
                                
                                
                            </table>
                            <div class="crt-total ">
                                 
                                    <h5>Total Price:</h5>

                                    <h5><?= $data['total_price'].'.00' ?></h5>
                                
                            </div>

                            <div class="btn-cod mt-2   bor-2">
                                    <label for="pay-mod">Payment Mode:  </label>
                                    <?= '  '.$data['payment_mode'] ?>
                            </div>

                            <div class="btn-cod mt-2   bor-2 d-flex gap-3">
                                    <label for="pay-mod">Status:  </label>
                                     <?php 
                                     if($data['status']==0){
                                        echo '<div class="text-warning"> Under Process </div>';
                                     }else if($data['status']==1){
                                        echo '<div class="text-success">Completed</div>';
                                     }
                                     else if($data['status']==2){
                                        echo '<div class="text-danger"> Canceled! </div>';
                                     }
                                     
                                     ?>
                            </div>
                            
                            <?php
                                if(($data['payment_mode'] == 'COD' && $data['status'] == 1) || ($data['payment_mode'] == 'Online Payment')){
                            ?>


                            <div class="down-resipt">
                                <a href="invoice.php?tracking_no=<?= $data['tracking_no']?>&o_id=<?= $data['id']?>" class="btn btn-success text-light mt-3">  <i class="bi bi-file-earmark-pdf"></i> Receipt</a>
                            </div>


                            <?php
                                
                                }

                            ?>
                        </div>
                     </div>
                     
                </div>
            </div>
        </section>
        <?php
                }
            }else {
                echo "<h4>Something went wrong</h4>";
            }
        }
        ?>
         
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
  integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="script.js"></script>

</html>