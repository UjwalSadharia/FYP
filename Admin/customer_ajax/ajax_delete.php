<?php  
    include 'db.php';
    $customer_id = $_POST['id'];

    $sql = "DELETE FROM customer WHERE customer_id = '{$customer_id}'";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo mysqli_error($conn);
    }
?>