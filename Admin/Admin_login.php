<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($query);

if($username == $row['username']){
  if($password == $row['password']){
    $_SESSION['user']=$username;
    echo 1;
  }else{
    echo 0;
  }
}else{
  echo 2;
}

?>