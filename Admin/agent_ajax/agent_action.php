<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    include '../../phpmailer/Exception.php';
    require '../../phpmailer/PHPMailer.php';
    require '../../phpmailer/SMTP.php';

    // connection to database
    include 'db.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    // $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lifetree67@gmail.com';                     //SMTP username
    $mail->Password   = '7698298660';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;
    $mail->setFrom('lifetree67@gmail.com', 'LifeTree.com');


    // approve button 
    if(isset($_POST['approve'])){
        $agent_id = $_POST['approve'];

        $sql="UPDATE agent SET status='approved' WHERE agent_id='{$agent_id}'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $a_sql = "SELECT * FROM agent WHERE agent_id='{$agent_id}'";
            $a_query = mysqli_query($conn,$a_sql);
            $row = mysqli_fetch_array($a_query);

           try {
            $mail->addAddress($row['email']);  
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'LifeTree.com';
            $mail->Body    = "Your Request For Being Agent At LifeTree.com Is <b>Approved</b>.ThankYou For Joining With Us, Your Login Details Are Username= <b>".$row['username']."</b> And Password= <b>".$row['password']."</b>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            echo 1;
           } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }else{
            echo 2;
        }
    }


    // reject button 
    if(isset($_POST['reject'])){
        $agent_id = $_POST['reject'];

        $sql="UPDATE agent SET status='rejected' WHERE agent_id='{$agent_id}'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $a_sql = "SELECT * FROM agent WHERE agent_id='{$agent_id}'";
            $a_query = mysqli_query($conn,$a_sql);
            $row = mysqli_fetch_array($a_query);

           try {
            $mail->addAddress($row['email']);  
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'LifeTree.com';
            $mail->Body    = $row['agent_name']." Your Request For Being Agent At LifeTree.com Is <b>Declined</b>.ThankYou For Connecting Us.";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            echo 1;
           } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }else{
            echo 2;
        }
    }


?>