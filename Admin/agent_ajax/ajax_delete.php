<?php  
    include 'db.php';
    $policy_id = $_POST['aid'];

    $sql = "DELETE FROM agent WHERE agent_id = '{$policy_id}'";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
?>