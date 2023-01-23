<?php
    require('../db.php');
    session_start();
    if(!isset($_SESSION['agency_id'])){
        header("Location: ../.../login_agency.php?access=false");
        exit();
    }
    $agency_id=$_SESSION['agency_id'];
    $query    = "select booked_cars.id as booking_id,booked_cars.created_at as created_at,vehicle_model,vehicle_number,no_of_days,no_of_seats,rent_per_day,start_date,user_id from `booked_cars` join cars on cars.id=booked_cars.car_id where agency_id='$agency_id' order by start_date desc;";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['booked_cars']=[];
        
        while($record=mysqli_fetch_assoc($result))
        $_SESSION['booked_cars'][]=$record;
        foreach ($_SESSION['booked_cars'] as $key => $booking) {
            $user_id=$booking['user_id'];
            $user="select * from customers where id='$user_id';";
            $user=mysqli_query($con,$user);
            $_SESSION['booked_cars'][$key]['user']=mysqli_fetch_assoc($user);
        }
        header("Location: ../../all_bookings_agency.php?");
        exit();
    } else {
        header("Location: get_cars.php?notFound=true");
        exit();
    }
   
    

    

?>