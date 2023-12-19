<?php 
include "connect.php";

$limit_per_page = 3;
$page = "";
if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
}else{
    $page = 1;
}

$offset = ($page - 1) * $limit_per_page;
$b_id = $_POST["b_id"];
$trending1 = mysqli_query($con, "SELECT * from product , categories , brand where product.c_id = categories.c_id and product.b_id = brand.b_id and product.`b_id`=$b_id and product.Status = 'active' LIMIT {$offset},{$limit_per_page}");
$output = "";
if (mysqli_num_rows($trending1) > 0) {
    $output .= '<div class="row">';

    while ($row = mysqli_fetch_array($trending1)) {
        $res = $row['PImage'];
        $res = explode(",", $res);
    

    $output .= "<div class=' col-12 col-md-6  col-lg-4   mb-5'>
            <a href='product.php?p_id={$row["p_id"]}'>
                <div class='product-container'>

                    <a href='product.php?p_id={$row["p_id"]}'>
                        <div class='pro-img'>

                            <img class='img-fluid' src='./uploads/products/{$res["0"]}' alt=''>

                        </div>
                    </a>

                    <div class='product-txt'>
                        <div class='watchlist'>
                            <div class='addWhishList' data-id='{$row["p_id"]}'>
                                <i class='bi bi-bag-heart'></i>
                            </div>
                        </div>
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
    

    }

    


$output .= "</div>";

    $records = mysqli_query($con,$sql) or die("Query Unsuccessful.");
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record/$limit_per_page);

    $output .=    "<div id='pagination'>


         <ul class='pagination justify-content-center'>";

        for($i = 1; $i <= $total_pages; $i++) {
            if($i == $page){
                $class_name = "page-link active";
            }else{
                $class_name = "page-link";
            }
            $output .= "<li class='page-item'><a class='{$class_name}' id='{$i}' href=''>{$i}</a></li>";
        }
             
             
        $output .= "</ul>
     </div>";

echo $output;
}else{

}

?>