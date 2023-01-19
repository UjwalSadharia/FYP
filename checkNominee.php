<?php
session_start();
include 'db.php';

if(isset($_POST['nData'])){
  
    $customerId = $_SESSION['user_loggedin_id'] ;

    $sql = "SELECT * FROM nominee WHERE customer_id = {$customerId}";

    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0){
        echo 1;
    }else{
        echo 2;
    }

}
?>