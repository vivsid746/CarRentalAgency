<?php
    require('../db.php');
    if(!isset($_POST['submit'])){
        header("Location: ../../index.php");
        exit();
    }
    session_start();
    if(!isset($_SESSION['agency_id'])){
        header("Location: ../../login_agency.php?access=false");
        exit();
    }
    $vehicle_model = mysqli_real_escape_string($con,$_POST['vehicle_model']);
    $vehicle_number = mysqli_real_escape_string($con,$_POST['vehicle_number']);
    $no_of_seats=mysqli_real_escape_string($con,$_POST['no_of_seats']);
    $rent_per_day=mysqli_real_escape_string($con,$_POST['rent_per_day']);
    $agency_id=$_SESSION['agency_id'];
    $available=mysqli_real_escape_string($con,$_POST['available']);
    $query    = "INSERT into `cars` (vehicle_model,vehicle_number, no_of_seats, rent_per_day,agency_id,is_available)
                VALUES ('$vehicle_model', '$vehicle_number','$no_of_seats', '$rent_per_day','$agency_id','$available')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header("Location: get_cars.php?added=success");
        exit();
    } else {
        header("Location: get_cars.php?added=failed");
        exit();
    }
   
    

    

?>