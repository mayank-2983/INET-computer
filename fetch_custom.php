<?php
    include "connect.php";
    
    if (isset($_POST['action'])){
        $sql="";
        $result="";
        if(isset($_POST['product'])){
            $sql = "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' ";
            $category_filter = implode("', '", $_POST['product']);
            
            $sql .= " and product.p_id IN('" . $category_filter . "')";
            $result = mysqli_query($con,$sql);
        
      
        
       

        $output = "";

        if (mysqli_num_rows($result) > 0) {
            $output .= '<div class="row">';
            $price = 0;
            $product_name = "";
            while ($row = mysqli_fetch_array($result)) {
                $res = $row['PImage'];
                $res = explode(",", $res);


            $output .= "<div class=' col-12 col-md-6  col-xl-4   mb-5'>
                    <a href='product.php?p_id={$row["p_id"]}'>
                        <div class='product-container'>

                             
                                <div class='pro-img'>

                                    <img class='img-fluid' src='./uploads/products/{$res["0"]}' alt=''>

                                </div>
                             

                            <div class='product-txt'>
                                 
                                <div class='quick-view' data-bs-toggle='modal' data-bs-target='#a{$row["p_id"]}'>
                                    <p>Quick View</p>
                                </div>
                                <span class='pro-categories'>
                                    <a href='categories.php?c_id={$row["c_id"]}'>{$row["CTitle"]}</a>
                                    <a href='brands.php?b_id={$row["b_id"]}'>{$row["BTitle"]}</a>
                                </span>
                                <h3>{$row["Title"]}</h3>
                                <div class='rating'>";

                                    $cpid = $row['p_id'];
                                    $review = mysqli_query($con, "SELECT * from productreview where  `p_id` = '$cpid' ");
                                    $c = 0;
                                    $sum_str = 0;
                                    if ($review) {
                                        while ($r = mysqli_fetch_array($review)) {
                                            $c++;
                                            $sum_str += $r['Rating'];
                                        }
                                        if (mysqli_num_rows($review) > 0) {
                                            $star = round($sum_str / $c);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($star < $i) {
                                                    $output .= '<i class="bi bi-star"></i>';
                                                } else {
                                                    $output .= '<i class="bi bi-star-fill"></i>';
                                                }
                                            }
                                        } else {
                                            $output .= "<p> ( There are no reviews yet. )</p>";
                                        }
                                    }

                               $output .= "</div>
                                <h5> ₹ {$row["SellPrice"]}.00</h5>
                            </div>
                        </div>
                    </a>
                </div>";
                $product_name .= $row["p_id"].",";
                $price += $row["SellPrice"];
            }

            

            $discound_price = $price;
            
            $output .= "</div> <a class='addcustomproduct btn btn-warning text-light mb-4' href='checkout.php?p_id={$product_name}'> checkout
                                </a>
                                
                                <input type='hidden' name='pro_id' id='pro_id' value=".$product_name.">
                                <input type='hidden' name='discound_price' id='discound_price' value=".$discound_price.">";
            
            echo $output;
            

            
        }
        }else{
            
        ?>
            <div class="row products-body mt-5">
				<div class="col-lg-12 main-content">
					
					<div class="d-flex justify-content-center">
						<img class="d-block m-auto img-fluid" src="./img/sorry.png" >
					</div>				
				</div>
            </div>
        <?php
        }
    }
?>

<script>
    $('.addcustomproduct').click(function(e){
  // e.preventDefault();
    var pro_id = $("#pro_id").val();
    var discound_price = $("#discound_price").val();
  

  $.ajax({
    type: "POST",
    url: "handelcustomproduct.php",
    data: {
        "pro_id" : pro_id,
        "discound_price" : discound_price,
        "scope": "add"
    },
    success: function (response) {
      
      if(response == 201 ){
        alert("Product added");
         
      }else if(response == 401 ){
        alert("login to continue");
        window.location.replace("login.php");
      }else if(response == 500 ){
        alert("Something went wrong");
      }
    }
  });


})


 </script>