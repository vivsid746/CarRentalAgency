<?php
    require('../db.php');
    if(!isset($_POST['submit'])){
        header("Location: ../../index.php");
        exit();
    }
    session_start();
    if(!isset($_SESSION['agency_id'])){
        header("Location: ../.../login_agency.php?access=false");
        exit();
    }
    $car_id=mysqli_real_escape_string($con,$_POST['car_id']);
    if(empty($car_id)){
        header("Location: get_cars.php?failed=true");
        exit();
    }
    $query    = "select * from `booked_cars` where car_id='$car_id' order by start_date desc;";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['booked_cars']=[];
        $query="select * from cars where id='$car_id';";
        //get car details
        $car=mysqli_query($con, $query);
        while($c=mysqli_fetch_assoc($car))
        $_SESSION['particular_car']=$c;

        //records of booked cars
        while($record=mysqli_fetch_assoc($result))
        $_SESSION['booked_cars'][]=$record;
        foreach ($_SESSION['booked_cars'] as $key => $booked_car) {
            $get_user_query="select * from customers where id=".$booked_car['user_id'];
            $user=mysqli_query($con,$get_user_query);
            $user=mysqli_fetch_assoc($user);
            $_SESSION['booked_cars'][$key]['user']=$user;
        }
        //for each record map its user;
        header("Location: ../../list_of_customers.php?car_id=".$car_id);
        exit();
    } else {
        header("Location: get_cars.php?notFound=true");
        exit();
    }
   
    

    

?>