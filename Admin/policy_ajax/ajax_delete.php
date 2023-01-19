<?php  
    include 'db.php';
    $policy_id = $_POST['id'];

    $sql = "DELETE FROM policy WHERE policy_id = '{$policy_id}'";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
?>