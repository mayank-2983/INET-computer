<?php 
    include("connect.php"); 

    $search_value = $_POST["search"];
    $blog = mysqli_query($con, "SELECT * FROM categories WHERE `CTitle` LIKE '%{$search_value}%'");
    $output = "";
    if (mysqli_num_rows($blog) > 0) {
        $output = '
            <thead>
                    <tr>
                        
                        <th>Category Title</th>
                        <th class="table-plus datatable-nosort">Image</th>
                        
                        <th>Status</th>
                        
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
            <tbody>';

            while($row = mysqli_fetch_array($blog))
            {
                
                
                
                $output .= "<tr>
                                <td>
                                    <h5 class='font-16'>{$row["CTitle"]}</h5>
                                </td>
                                <td class='table-plus'>
                                    <img src='../uploads/category/{$row["CImage"]}' width='70' height='70' alt='' />
                                </td>
                                
                                <td>{$row["CStatus"]}</td>
                                <td>
                                <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#'
                                        role='button' data-toggle='dropdown'>
                                        <i class='fa fa-chevron-circle-down' style='font-size: 20px;'></i>

                                    </a>
                                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                                        <a class='dropdown-item' href='editCategories.php?c_id={$row["c_id"]}'><i class='dw dw-edit2'></i> Edit</a>
                                        <a class='dropdown-item' href='deleteCategories.php?c_id={$row["c_id"]}'><i class='dw dw-delete-3'></i> Delete</a>
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