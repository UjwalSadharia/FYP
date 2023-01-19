<?php
session_start();
include 'db.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        
    

        $username = $_POST['username'];
        $password = $_POST['password'];
        // $password = 'Hardiv@123';


        // $sql = "SELECT * FROM customer WHERE username='{$username}' AND password='{$password}'";
        $sql = "SELECT * FROM customer WHERE username='{$username}'";
        $query = mysqli_query($conn,$sql) or die("sorry ubable to fetch record because of---->".mysqli_error($conn));



        $row = mysqli_fetch_assoc($query) or die('no record found');

        if($username == $row['username']){
            // if($password == $row['password']){
            if(password_verify($password,$row['password'])){
                $_SESSION['user_loggedin'] = $row['c_name'];
                $_SESSION['user_loggedin_id'] = $row['customer_id'];
                echo 1;

            }else{
                echo 0;
                // echo mysqli_error($conn);
            }
        }else{  
            echo 2;
            // echo mysqli_error($conn);
        }

    }


?>

<?php

    if(isset($_POST['ausername'])){
        $agentUsername = $_POST['ausername'];
        $agentPassword = $_POST['apassword'];

        $sql = "SELECT * FROM agent WHERE username = '{$agentUsername}' AND status='approved'";
        $query = mysqli_query($conn,$sql) or die('sorry something went wrong because of--->'.mysqli_error($conn));

        // if($query){
            $row = mysqli_fetch_assoc($query);
            if($agentUsername == $row['username']){
                if($agentPassword == $row['password']){
                    $_SESSION['agentName'] = $row['agent_name'];
                    $_SESSION['agentId'] = $row['agent_id'];
                    echo 1;
                }else{      
                    echo 3;
                }
            }else{
                echo 2;
            }
        // }else{
        //     echo "Username or password invalid";
        // }
    }

?>