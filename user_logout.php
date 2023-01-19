<?php
session_start();
if(isset($_SESSION['user_loggedin'])){
    unset($_SESSION['user_loggedin']);
    unset($_SESSION['user_loggedin_id']);
    header('location:index.php');
}

?>