<?php
if ((isset($_SESSION['u_id'])) || (isset($_COOKIE['u_id']))){
    $u_id = "";
    if(isset($_COOKIE['u_id'])){
        $u_id = $_COOKIE['u_id'];
    }else{
        $u_id = $_SESSION['u_id'];
    }
    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `u_id` = '$u_id'");
    $result_fetch=mysqli_fetch_assoc($sql);
}
?>


<h6>Hi, <?= $result_fetch['UserName'] ?><h6>
<ul>
    <li><a href="./account.php">Account</a></li>
    <li><a href="./settings.php">Settings</a></li>
    <li><a href="./myorder.php">My Order</a></li>
    <!-- <li><a href="./history.php">History</a></li> -->
    <li><a href="./logout.php">Logout</a></li>
</ul>