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
    $car_id=mysqli_real_escape_string($con,$_POST['car_id']);

    if(empty($car_id)){
        header("Location: ../../add_car.php?notFound=true");
        exit();
    }
    $query    = "delete from `cars` where id='$car_id'";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header("Location: get_cars.php?delete=success");
        exit();
    } else {
        header("Location: get_cars.php?delete=failed");
        exit();
    }
   
    

    

?>