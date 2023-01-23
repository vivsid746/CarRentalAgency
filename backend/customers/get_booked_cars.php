<?php
    require('../db.php');
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../../login_customers.php?access=false");
        exit();
    }
    $user_id=$_SESSION['user_id'];
    $query    = "select booked_cars.id as booked_id,booked_cars.created_at as created_at,cars.id as car_id,no_of_days,start_date,cars.agency_id,vehicle_model,vehicle_number,no_of_seats,rent_per_day from booked_cars join cars on cars.id=booked_cars.car_id where user_id='$user_id' order by start_date desc";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['bookings']=[];
        while($booking=mysqli_fetch_assoc($result))
        $_SESSION['bookings'][]=$booking;

        //assign agency to each booking

        foreach ($_SESSION['bookings'] as $key => $booking) {
            $agency_id=$booking['agency_id'];
            $agency="select agency_name,agency_email from agencies where id='$agency_id';";
            $agency=mysqli_query($con,$agency);
            $agency=mysqli_fetch_assoc($agency);
            $_SESSION['bookings'][$key]['agency']=$agency;
        }
        header("Location: ../../booked_cars.php?");
        exit();
    } else {
        header("Location: get_available_cars.php?notFound=true");
        exit();
    }

?>