<?php
$id = $_POST["id"];
$data = array();
$data = setcookie("cart",json_encode($id),time()+3600*24,'/');

array_push($data,$id);
$data = json_decode($_COOKIE["cart"],true);
if ($data) {
    header("location: ../detail.php?id=$id");
}else{
    die("connection error!");
}