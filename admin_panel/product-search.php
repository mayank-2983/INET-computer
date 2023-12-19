<?php 
    include("connect.php"); 

    $search_value = $_POST["search"];
    $product = mysqli_query($con, "SELECT * FROM product WHERE `Title` LIKE '%{$search_value}%' OR `SellPrice` LIKE '%{$search_value}%' OR `Price` LIKE '%{$search_value}%' OR `Discount` LIKE '%{$search_value}%' OR `QTY` LIKE '%{$search_value}%' OR `Status` LIKE '%{$search_value}%'");
    $output = "";
    if (mysqli_num_rows($product) > 0) {
        $output = '
            <thead>
                <tr>
                    
                    <th>Title</th>
                    <th class="table-plus datatable-nosort">Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Sell Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>

            <tbody>';

            while($row = mysqli_fetch_array($product))
            {
                $res=$row['PImage'];
                $res=explode(",",$res);
                
                
                $output .= "<tr>
                                <td>
                                    <h5 class='font-16'>{$row["Title"]}</h5>
                                </td>
                                <td class='table-plus'>
                                    <img src='../uploads/products/{$res["0"]}' width='70' height='70' alt='' />
                                </td>
                                <td>{$row["Price"]}</td>
                                <td>{$row["Discount"]}</td>
                                <td>{$row["SellPrice"]}</td>
                                <td>{$row["QTY"]}</td>
                                <td>{$row["Status"]}</td>
                                <td>
                                <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#'
                                        role='button' data-toggle='dropdown'>
                                        <i class='fa fa-chevron-circle-down' style='font-size: 20px;'></i>

                                    </a>
                                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                                        <a class='dropdown-item' href='edit_product.php?p_id={$row["p_id"]}'><i class='dw dw-edit2'></i> Edit</a>
                                        <a class='dropdown-item' href='deleteProduct.php?p_id={$row["p_id"]}'><i class='dw dw-delete-3'></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        ";
            }
                 
                        
                    
            
           $output .=  '</tbody>
        ';

        echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
} 
?>