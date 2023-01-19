<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "fyp";

  $conn = mysqli_connect($servername,$username,$password,$database) or die("Sorry unable to connect because of ----->".mysqli_error($conn));

?>

