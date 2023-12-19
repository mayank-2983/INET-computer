<?php 
    include("connect.php"); 

    $search_value = $_POST["search"];
    $order = mysqli_query($con, "SELECT * FROM `orders` WHERE `tracking_no` LIKE '%{$search_value}%' OR  `total_price` LIKE '%{$search_value}%' ORDER BY  `orders`.`created_at` DESC ");
    
    $output = "";
    if (mysqli_num_rows($order) > 0) {
        $output = '
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Tracking No</th>
                        
                        <th>Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="">View</th>
                    </tr>
                </thead>
            <tbody>';

            while($row = mysqli_fetch_array($order))
            {
                $user = mysqli_query($con, "SELECT * FROM `user` WHERE `u_id` = {$row['u_id']}");
                $data = mysqli_fetch_array($user);
                $username = $data["UserName"];

                $status = '';
                
                $date2 = $row['created_at'];
                $date = date('Y-m-d',strtotime($date2));
                if($row["status"]==0){
                   $status = '<div class="text-warning"> Under Process </div>';
                }else if($row['status']==1){
                   $status = '<div class="text-success">Completed</div>';
                }
                else if($row['status']==2){
                   $status = '<div class="text-danger"> Canceled! </div>';
                }
                
                
                $output .= " <tr>

                                    <td>
                                        {$row["id"]} 
                                    </td>
                                    <td>
                                        {$username} 
                                    </td>
                                    <td class='table-plus'>
                                        {$row["tracking_no"]}
                                    </td>
                                    <td>
                                        {$row["total_price"]}.00
                                    </td>
                                    <td>
                                    {$status}
                                    </td>
                                    <td> {$date}</td>
                                    <td>
                                        <a href='viewOrderDetail.php?t={$row["tracking_no"]}&&u_id={$row["u_id"]}' class='btn btn-primary'> View Details</a>
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