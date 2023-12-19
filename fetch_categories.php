<?php
    include "connect.php";
    
    if (isset($_POST['c_id'])){
        $id = $_POST['c_id'];
        
        $sql = "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.Status = 'active' and product.`c_id`=$id";

        if(isset($_POST['brand'])){
            $brand_filter = implode("', '", $_POST['brand']);
            
            $sql .= " and product.b_id IN('" . $brand_filter . "')";
        }
        
        
        if(!empty($_POST['filter'])){
            $sort_by = $_POST['filter'];

            switch ($sort_by){
                case "tranding":
                    $sql .= " and `product`.`trending` = 1";
                    break;
                case "asc":
                    $sql .= " ORDER BY `product`.`Title` ASC";
                    break;
                case "desc":
                    $sql .= " ORDER BY `product`.`Title` DESC";
                    break;
                case "LtoH":
                    $sql .= " ORDER BY `product`.`SellPrice` ASC";
                    break;
                case "HtoL":
                    $sql .= " ORDER BY `product`.`SellPrice` DESC";
                    break;
                case "new_to_old":
                    $sql .= " ORDER BY `product`.`created_at` DESC";
                    break;
                case "olg_to_new":
                    $sql .= " ORDER BY `product`.`created_at` ASC";
                    break;
                 
            }
            
        }

        $result = mysqli_query($con,$sql);
        $output = "";

        if (mysqli_num_rows($result) > 0) {

        ?>
            <div class="row">
        <?php
            while ($row = mysqli_fetch_array($result)) {
                $res = $row['PImage'];
                $res = explode(",", $res);
        
            ?>

            <div class="col-12 col-md-6  col-lg-4   mb-5">
                    <a href="product.php?p_id=<?php $row['p_id'] ?>">
                        <div class="product-container">

                            <a href="product.php?p_id=<?= $row['p_id'] ?>">
                                <div class="pro-img">

                                    <img class="img-fluid" src="./uploads/products/<?= $res['0'] ?>" alt="">

                                </div>
                            </a>

                            <div class="product-txt">
                                <div class="watchlist">
                                    <div class="addWhishList" data-id="<?= $row['p_id'] ?>">
                                        <i class="bi bi-bag-heart"></i>
                                    </div>
                                </div>
                                <div class="quick-view" data-bs-toggle="modal" data-bs-target="#a<?= $row['p_id'] ?>">
                                    <p>Quick View</p>
                                </div>
                                <span class="pro-categories">
                                    <a href="categories.php?c_id=<?= $row['c_id'] ?>"><?= $row['CTitle'] ?></a>
                                    <a href="brands.php?b_id=<?= $row['b_id'] ?>"><?= $row['BTitle'] ?></a>
                                </span>
                                <h3><?= $row['Title'] ?></h3>
                                <div class="rating">
                                <?php
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
                                                ?>

                                                    <i class="bi bi-star"></i>
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="bi bi-star-fill"></i>
                                                <?php
                                                }
                                            }
                                        } else {
                                        ?>
                                            <p> ( There are no reviews yet. )</p>
                                        <?php
                                        }
                                    }
                                ?>

                               </div>
                                <h5> ₹ <?= $row['SellPrice'] ?>.00</h5>
                            </div>
                        </div>
                    </a>
                </div>

<?php
            }
?>



            </div>
            <?php
        }else{
            
        ?>
            <div class="row products-body">
				<div class="col-lg-9 main-content">
					
					<div class="d-flex justify-content-center">
						<img src="./img/sorry.png" style="width: 778px;height: 501px;">
					</div>				
				</div>
            </div>
        <?php
        }
    }else{
        header("Location: 404.php");
    }
?>

 <script>
    $('.addWhishList').click(function(e){
  // e.preventDefault();
  var pro_id = $(this).data("id");
  

  $.ajax({
    type: "POST",
    url: "handelwishlist.php",
    data: {
        "pro_id" : pro_id,
        "scope": "Wsadd"
    },
    success: function (response) {
      
      if(response == 201 ){
        alert("Product added to wishlist");
        loaddata();
       
      }else if(response == 440 ){
        alert("You already have this item in your wishlist");
      }else if(response == 401 ){
        alert("login to continue");window.location.replace("login.php");
      }else if(response == 500 ){
        alert("Something went wrong");
      }
    }
  });
  loadwish();

})
function loadwish()
{
  $.ajax({
    type: "POST",
    url: "wish-count.php",
     
    success: function (response) {
       $('#wish-sub').html(response);
      
      }
    
  });
}
 </script>