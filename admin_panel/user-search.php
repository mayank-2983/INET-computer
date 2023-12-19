<?php 
    include("connect.php"); 

    $search_value = $_POST["search"];
    $blog = mysqli_query($con, "SELECT * FROM user WHERE `UserName` LIKE '%{$search_value}%' OR `FirstName` LIKE '%{$search_value}%' OR `LastName` LIKE '%{$search_value}%' OR `EmailAddress` LIKE '%{$search_value}%' OR `HomePhone` LIKE '%{$search_value}%' OR `DOB` LIKE '%{$search_value}%'");
    $output = "";
    if (mysqli_num_rows($blog) > 0) {
        $output = '
            <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>EmailAddress</th>
                        <th>Phone No.</th>
                        <th>DOB</th>
                        
                    </tr>
                </thead>
            <tbody>';

            while($row = mysqli_fetch_array($blog))
            {
                
                
                
                $output .= "<tr>

                        <td>{$row["UserName"]}</td>
                        <td>{$row["FirstName"]}</td>
                        <td>{$row["LastName"]}</td>
                        <td>{$row["EmailAddress"]}</td>
                        <td>{$row["HomePhone"]}</td>
                        <td>{$row["DOB"]}</td>
                        
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