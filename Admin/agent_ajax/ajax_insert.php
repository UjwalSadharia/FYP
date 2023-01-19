<?php
include 'db.php';
// Admin add agent 
if(isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];

$dob = date('Y-m-d',strtotime($_POST['dob']));


$address = $_POST['address'];   
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$branch = $_POST['branch'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$sql = "INSERT INTO agent(username,password,agent_name,email,dob,address,city,state,zipcode,branch,gender,phone,status)VALUES('{$username}','{$password}','{$name}','{$email}','{$dob}','{$address}','{$city}','{$state}','{$zipcode}','{$branch}','{$gender}',{$phone},'approved')";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}

}

// agent manual signup 
if(isset($_POST['a_username'])){

    extract($_POST);
    $date =  date('Y-m-d',strtotime($_POST['a_dob']));

    $sql = "INSERT INTO agent(username,password,agent_name,email,dob,address,city,state,zipcode,branch,gender,phone,status)VALUES('{$a_username}','{$a_password}','{$a_name}','{$a_email}','{$date}','{$a_address}','{$a_city}','{$a_state}','{$a_zipcode}','{$a_branch}','{$a_gender}',{$a_phone},'pending')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo 1;
    }else{
        echo mysqli_error($conn);
        // echo 'Please Fill All The Details';
    }
}


// users nominee ADD
if(isset($_POST['n_name'])){
    extract($_POST);
    $n_dob =  date('Y-m-d',strtotime($_POST['n_dob']));
    $sql = "INSERT INTO nominee(name,customer_id,email,address,relation,gender,phone,dob)VALUES('{$n_name}','{$n_customer}','{$n_email}','{$n_address}','{$n_relation}','{$n_gender}',{$n_phone},'{$n_dob}')";
    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 2;
    }
}

?>