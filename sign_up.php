<?php
include 'db.php';

    if(isset($_FILES['su_profilepic']['name'])){
        $su_name= $_POST['su_name'];
        $su_email = $_POST['su_email'];
        $su_username = $_POST['su_username'];

        // PASSWORD HASHING 
        $su_password = $_POST['su_password'];
        $hashPassoword = password_hash($su_password,PASSWORD_BCRYPT);


        $su_phone = $_POST['su_phone'];
        $su_address = $_POST['su_address'];
        $su_city = $_POST['su_city'];
        $su_state = $_POST['su_state'];
        $su_zipcode = $_POST['su_zipcode'];
        $su_marital_status = $_POST['su_marital_status'];

        // managing date 
        $su_dob = date('Y-m-d',strtotime($_POST['su_dob']));
        // $su_dob = $_POST['su_dob'];
        $su_gender = $_POST['su_gender'];



        // profile pic managing
        $profilepic = $_FILES['su_profilepic']['name'];

        $extension = pathinfo($profilepic,PATHINFO_EXTENSION);
        $valid_extension = ['jpg','jpeg','png'];

        if(in_array($extension,$valid_extension)){
            $new_name = rand() . "." . $extension;
            $path = "uploaded_image/" . $new_name;

            if(move_uploaded_file($_FILES['su_profilepic']['tmp_name'],$path)){
                $sql = "INSERT INTO customer(c_name,email,username,password,phone,image,address,city,state,zipcode,marital_status,dob,gender)VALUES('{$su_name}','{$su_email}','{$su_username}','{$hashPassoword}',{$su_phone},'{$new_name}','{$su_address}','{$su_city}','{$su_state}',{$su_zipcode},'{$su_marital_status}','{$su_dob}','{$su_gender}')";
                if(mysqli_query($conn,$sql)){
                    echo 1;
                }else{
                    echo mysqli_error($conn);
                }
            }else{
                echo "<script>alert('sorry unable to upload file')</script>";
            }

        }else{
            echo "<script>alert('Invalid File Extension')</script>";
        }
    
    
    
    
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>