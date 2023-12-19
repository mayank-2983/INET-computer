<?php 
    include("connect.php"); 

    $search_value = $_POST["search"];
    $policy = mysqli_query($con, "SELECT * FROM `policy` WHERE `Title` LIKE '%{$search_value}%'");
    $output = "";
    if (mysqli_num_rows($policy) > 0) {
        $output = '
            <thead>
                        <tr>
                             
                            <th>Title</th>
                            <th class="table-plus datatable-nosort">Discription</th>
                            <th style="max-width:500px;">Status</th>
                            
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>

            <tbody>';

            while($row = mysqli_fetch_array($policy))
            {
                
                
                
                $output .= "<tr>
                                <td>
                                
                                    <h5 class='font-16'>{$row["Title"]}</h5>
                                
                                </td>
                                <td>{$row["Discription"]}</td>
                                <td>{$row["Status"]}</td>
                            <td>
                                <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#'
                                        role='button' data-toggle='dropdown'>
                                        <i class='fa fa-chevron-circle-down' style='font-size: 20px;'></i>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                                        <a class='dropdown-item' href='editPolicy.php?id={$row["id"]}'><i class='dw dw-edit2'></i> Edit</a>
                                        <a class='dropdown-item' href='deletePolicy.php?id={$row["id"]}><i class='dw dw-delete-3'></i> Delete</a>
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