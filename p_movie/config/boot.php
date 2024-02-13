<?php
session_start();
require_once 'database.php';
$db = new Database();

function alert($msg){
    echo "<script>alert('$msg')</script>";
}

function redirect($lo){
    echo "<script>window.location='$lo'</script>";
}

?>