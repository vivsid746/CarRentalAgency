<?php

require('../db.php');
session_start();
if (isset($_POST['login'])) { 
    $username = mysqli_real_escape_string($con, $_POST['agency_email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
    $query    = "SELECT * FROM `agencies` WHERE agency_email='$username'
                 AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        while($record=mysqli_fetch_assoc($result)){
            $_SESSION['agency_id'] = $record['id'];
            $_SESSION['agency_email'] = $record['agency_email'];
            $_SESSION['agency_name'] = $record['agency_name'];
            $_SESSION['name'] = $record['name'];

            header("Location: ../agency/get_cars.php");
        }
      
    } else {
        header("Location: ../../login_agency.php?login=failed&email=".$username);
        exit();
    }
}
?>