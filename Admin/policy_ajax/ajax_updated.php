<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$category = $_POST['category'];
$sumass = $_POST['sumass'];
$premium = $_POST['premium'];
$agelim = $_POST['agelim'];

$sql = "UPDATE policy SET policy_name='{$name}', policy_description ='{$desc}', category='{$category}', sum_assured='{$sumass}', premium='{$premium}', age_limit='{$agelim}' WHERE policy_id='{$id}'";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>