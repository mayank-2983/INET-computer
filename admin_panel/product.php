
<?php 
    require('connect.php');
    
    include 'myfuncations.php';
        
    if (isset($_POST['add-product']))
    {
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Price = $_POST['Price'];
        $Discount = $_POST['Discount'];
        $QTY =  $_POST['QTY'];
        $Status = $_POST['Status'];
        $c_id = $_POST['c_id'];
        $b_id = $_POST['b_id'];
        $trending = isset($_POST['trending']) ? '1':'0';
        $SellPrice = $Price - ($Price/100)*$Discount;
        $PImage = $_FILES['PImage']['name'];

        $location = "../uploads/products/";

        $file = "";
        $file_temp ="";
        $data="";
        foreach($_FILES['PImage']['name'] as $key=>$val ){
           $file=microtime().$PImage[$key];
            $file_temp=$_FILES['PImage']['tmp_name'][$key];
            move_uploaded_file($file_temp,$location.$file);
            $data .=$file.",";
        }
        
        

        // $filename = time().'.'.$PImage;

        $product_exists = "SELECT * FROM `product` WHERE `Title` = '$Title'";
        $check = mysqli_query($con,$product_exists);
        if ($check)
        {
            if (mysqli_num_rows($check)>0)
            {   
                $result_fetch = mysqli_fetch_array($check);
                if ($result_fetch['Title']==$Title) {
                    redirect("Product alredy exists","addProduct.php");
                }
            }
            else
            {
                $result_insert = mysqli_query($con,"INSERT INTO `product`(`Title`, `Discription`, `PImage`, `Price`, `Discount`, `SellPrice`, `QTY`, `Status`, `c_id`, `b_id`, `trending`) VALUES ('$Title','$Discription','$data','$Price','$Discount','$SellPrice','$QTY','$Status','$c_id','$b_id','$trending')");
                if ($result_insert) 
                {
                    // move_uploaded_file($_FILES['PImage']['tmp_name'], $path.'/'.$filename);
                    
                    redirect("Product added","addProduct.php");
                }
                else
                {
                    redirect("Something went wrong","addProduct.php");
                }
            }
        }
        else
        {
            redirect("Can Not Run Query","addProduct.php");
        }
    }

    if (isset($_POST['edit-product'])) {
        $p_id = $_POST['p_id'];
        $Title = $_POST['Title'];
        $Discription = $_POST['Discription'];
        $Price = $_POST['Price'];
        $Discount = $_POST['Discount'];
        $QTY =  $_POST['QTY'];
        $Status = $_POST['Status'];
        $c_id = $_POST['c_id'];
        $b_id = $_POST['b_id'];
        $trending = isset($_POST['trending']) ? '1':'0';
        $SellPrice = $Price - ($Price/100)*$Discount;
        $PImage = $_FILES['PImage']['name'];
        $old_image = $_POST['old_image'];
        
        

        
        $location = "../uploads/products/";

       

            //    header("Location:addproduc.php");     
        
        
        $data = "";
            if(count(array_filter($PImage)) == 0)
            {
             
                
                
                $data .=$old_image;
                

            }else{   
               foreach($_FILES['PImage']['name'] as $key=>$val ){
                   $file=time().$PImage[$key];
                    $file_temp=$_FILES['PImage']['tmp_name'][$key];
                    move_uploaded_file($file_temp,$location.$file);
                    $data .=$file.",";
                }
                
            }
            
        
        

        $update_query = "UPDATE `product` SET `Title`='$Title',`Discription`='$Discription',`PImage`='$data',`PImage`='$data',`Price`='$Price',`Discount`='$Discount',`SellPrice`='$SellPrice',`QTY`='$QTY',`Status`='$Status',`c_id`='$c_id',`b_id`='$b_id',`trending`='$trending' WHERE `p_id`='$p_id'";

        $update_query_run = mysqli_query($con,$update_query);

        if($update_query_run)
        {
            
            
            // move_uploaded_file($_FILES['Image']['tmp_name'],$location.'/'.$filename );
                
            
            header("Location:viewproduct.php");
        }
        else
        {
            header("Location:edit_product.php");
        }
    }



?>