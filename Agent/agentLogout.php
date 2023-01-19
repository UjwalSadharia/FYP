<?php
    session_start();
    if(isset($_SESSION['agentId'])){
        unset($_SESSION['agentId']);
        unset($_SESSION['agentName']);
        header('location:../index.php');
    }
?>