<?php
include 'db.php';

$que = mysqli_real_escape_string($conn,$_POST['que']);
// $que = $_POST['que'];

// echo $que;

$sql = "SELECT reply FROM chatbot WHERE question LIKE '%$que%'" or die('no record found--->'.mysqli_error($conn));
$query = mysqli_query($conn,$sql);



if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    echo $row['reply'];
}else{
    echo "Sorry, Unable to answer..";
}




?>