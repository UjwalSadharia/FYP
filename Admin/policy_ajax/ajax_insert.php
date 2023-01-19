<?php
    include 'db.php';

    $policy_name = $_POST['name'];
    $policy_description = $_POST['desc'];
    $category = $_POST['category'];
    $sum_assured = $_POST['sumass'];
    $premium = $_POST['premium'];
    $age_limit = $_POST['agelimit'];

    $sql = "INSERT INTO policy(policy_name,policy_description,category,sum_assured,premium,age_limit)VALUES('$policy_name','$policy_description','$category','$sum_assured','$premium','$age_limit')";
    // $query = mysqli_query($conn,$sql) or die("Sorry, unable to insert because of ----> ".mysqli_error($conn));

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }

?>