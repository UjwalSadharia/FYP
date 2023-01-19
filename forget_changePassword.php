<?php
    include 'db.php';
    if(isset($_GET['to'])){

      
    }else{
        header('location:forget_pass.php');
    }

      // CHANGE PASSWORD 
    if(isset($_POST['password']) && isset($_POST['confPassword'])){

      $id = $_GET['to'];
      $password = $_POST['password'];

      $hashPassword = password_hash($password,PASSWORD_BCRYPT);

      $sql = "UPDATE customer SET password='{$hashPassword}' WHERE customer_id={$id}";
      $query = mysqli_query($conn,$sql);
      if($query){
          echo 1;
      }else{
          echo 6;
      }
      exit;
    }
?>
      

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeTree.com</title>

    <!-- Favicon  -->
    <link rel="icon" href="myimage/favicon.png">

    <!-- Bootstrap 5 css  -->
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">

    <link rel="stylesheet" href="custom code/style.css">
    <link rel="stylesheet" href="custom code/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
<div id="preloader"></div>
    <div class="fp_wrapper">
        <div class="main_form">
            <img src="myimage/darkLogo1-removebg-preview.png" class="img-fluid" alt="">
            <!-- <big>Account Recovery</big> -->
            <small>Enter password and confirm password to change your account's password</small>
            <form id = "forgetPassForm1">
                <div id='success'></div>
                <div class="mb-2">
                              <label for="password" class="form-label">Password</label>
                              <input type="text" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.' name="password" autocomplete="of" class="form-control" id="password"
                                aria-describedby="" required>
                 </div>
                 <div class="mb-3">
                              <label for="confPassword" class="form-label">Confirm Password</label>
                              <input type="text" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.' name="confPassword" autocomplete="of" class="form-control" id="confPassword"
                                aria-describedby="" required>
                </div>
               

                <button type="submit" id='btnsubmit' name="forgetPassSubmit1" class="btn btn-primary">Change Password</button>
            </form>
            <a href="index.php" id='backtohome'></a>
        </div>
    </div>
          <!-- jQuery  -->
  <script src="jQuery/jquery.js"></script>
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
  <script>
      $(document).ready(function(){
        function preloader(){
              $('#preloader').hide();
          }
          preloader();


        //   CHANGE PASSWORD 
        $('#forgetPassForm1').on('submit',function(e){
            e.preventDefault();
            var password = $('#password').val();
            var confPassword = $('#confPassword').val();
            if(password == confPassword){
                $.ajax({
                    // url:'forget_changePassword.php',
                    type:'POST',
                    data:{
                        password:password,
                        confPassword:confPassword
                    },
                    success:function(data){
                        $('#success').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Password changed successfully. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                        $('#backtohome').html("<i class='bi bi-arrow-left'></i> Back To Home");
                        $('#password').val('');
                        $('#confPassword').val('');
                    }
                })
            }else{
                $('#success').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Password does not match<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            }
        })
        
      })
  </script>
    </body>

</html>



