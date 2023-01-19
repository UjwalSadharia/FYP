<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'db.php';
require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if(isset($_POST['email']) && isset($_POST['username'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM customer WHERE username='{$username}' AND email='{$email}'";
    $query = mysqli_query($conn,$sql) or die('Sorry,something went wrong because of--->'.mysqli_error($conn));
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);

        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lifetree67@gmail.com';                     //SMTP username
            $mail->Password   = '7698298660';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('lifetree67@gmail.com', 'LifeTree.com');
            $mail->addAddress($email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body    = 'Click To Reset Your Password. http://localhost/FYP/forget_changePassword.php?to='.$row['customer_id'];
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 1 ;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }else{
        echo 3;
    }
   







  exit;
}
// else{
//     echo 2;
// }
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
            <small>Enter username & email associated with your account and we'll send you a link to reset your password</small>
            <form id = "forgetPassForm">
                <div id='success'></div>
                <div class="mb-2">
                              <label for="su_username" class="form-label">Username</label>
                              <input type="text" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed" name="username" autocomplete="of" class="form-control" id="su_username"
                                aria-describedby="" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email"  pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" autocomplete='off' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
               

                <button type="submit" id='btnsubmit' name="forgetPassSubmit" class="btn btn-primary">Continue</button>
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

        $('#forgetPassForm').on('submit',function(event){
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url:'forget_pass.php',
                contentType: false,
                data: formData,
                type: "POST",
                processData: false,
                beforeSend:function(){
                    $('#preloader').show();
                },
                success:function(data){
                    if(data == 1){
                        $('#success').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Check your email to reset password.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                    }else{
                        $('#success').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Invalid Username or Email.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                    }
                },
                complete: function(){
                    $('#email').val('');
                    $('#backtohome').html("<i class='bi bi-arrow-left'></i> Back To Home");
                    preloader();
                }
            })
        })
      })
  </script>
</body>

</html>




