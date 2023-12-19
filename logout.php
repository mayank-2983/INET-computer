<?php 
    session_start();
    session_unset();
    session_destroy();
    setcookie("u_id",$result_fetch['u_id'],time()-(86400 * 30),'/');
                  
    header("location: index.php");


?>