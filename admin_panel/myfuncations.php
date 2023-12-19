<?php 
require('connect.php');

function redirect($message,$url)
{
    session_start(); 
    header('Location: '. $url);
    $_SESSION['message'] = $message;
    exit();
}

function getall($table){
    global $con;
    $sql = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $sql);
}

function getById($table,$data,$id){
    global $con;
    $sql = "SELECT * FROM $table WHERE $data='$id'";
    return $query_run = mysqli_query($con, $sql);
}

function delete($table,$id){
    global $con;
    $sql = "DELETE FROM $table WHERE $id='$id'";
    return $query_run = mysqli_query($con, $sql);
}

?>