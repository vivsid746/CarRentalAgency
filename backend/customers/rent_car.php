<?php
    require('../db.php');
    if(!isset($_POST['rent_car'])){
        header("Location: ../../index.php");
        exit();
    }
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../../login_customers.php?access=false");
        exit();
    }
    $user_id=$_SESSION['user_id'];
    $days = mysqli_real_escape_string($con,$_POST['no_of_days']);
    $start_date = mysqli_real_escape_string($con,$_POST['start_date']);
    $car_id = mysqli_real_escape_string($con,$_POST['car_id']);
    if(empty($car_id)){
        header("Location: get_available_cars.php?notFound=true");
        exit();
    }
    $query    = "INSERT into `booked_cars` (user_id,car_id, no_of_days, start_date)
                VALUES ('$user_id', '$car_id','$days', '$start_date')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header("Location: get_available_cars.php?booked=true");
        exit();
    } else {
        header("Location: get_available_cars.php?notFound=true");
        exit();
    }
   
    

    

?>