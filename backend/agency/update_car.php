<?php
    require('../db.php');
    if(!isset($_POST['submit'])){
        header("Location: ../index.php");
        exit();
    }
    session_start();
    if(!isset($_SESSION['agency_id'])){
        header("Location: ../login_agency.php?access=false");
        exit();
    }
    $car_id=mysqli_real_escape_string($con,$_POST['car_id']);
    
    $vehicle_model = mysqli_real_escape_string($con,$_POST['vehicle_model']);
    $vehicle_number = mysqli_real_escape_string($con,$_POST['vehicle_number']);
    $no_of_seats=mysqli_real_escape_string($con,$_POST['no_of_seats']);
    $rent_per_day=mysqli_real_escape_string($con,$_POST['rent_per_day']);
    if(empty($car_id)){
        header("Location: ../add_car.php?notFound=true");
        exit();
    }
    $available=mysqli_real_escape_string($con,$_POST['available']);
    $query    = "update `cars` set vehicle_model='$vehicle_model',vehicle_number='$vehicle_number', no_of_seats='$no_of_seats', rent_per_day='$rent_per_day',is_available='$available' where id='$car_id'";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header("Location: get_cars.php?update=success");
        exit();
    } else {
        header("Location: get_cars.php?update=failed");
        exit();
    }
   
    

    

?>