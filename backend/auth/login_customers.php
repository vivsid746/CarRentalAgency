<?php

require('../db.php');
session_start();
if(isset($_SESSION['agency_id'])){
    header("Location: ../agency/get_cars.php?rent=false");
    exit();
}
if (isset($_POST['login'])) { 
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $query    = "SELECT * FROM `customers` WHERE email='$username'
                 AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        while($record=mysqli_fetch_assoc($result)){
            $_SESSION['user_id'] = $record['id'];
            $_SESSION['user_email'] = $record['email'];
            $_SESSION['user_name'] = $record['name'];
            
            header("Location: ../customers/get_available_cars.php");
        }
       
    } else {
        header("Location: ../../login_customers.php?failed=true&email=".$username);
        exit();
    }
}
?>