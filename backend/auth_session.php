<?php
    session_start();
    if(!isset($_SESSION["customer_id"])) {
        header("Location: ../login_customers.php");
        exit();
    }
?>