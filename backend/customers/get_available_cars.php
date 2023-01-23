<?php
    require('../db.php');
    session_start();
    // if(!isset($_SESSION['user_id'])){
    //     header("Location: ../../login_customers.php?access=false");
    //     exit();
    // }
    $params=(isset($_GET['notFound'])?"notFound=true":(isset($_GET['booked'])?"booked=true":""));
    $query    = "select cars.id,vehicle_model,vehicle_number,no_of_seats,rent_per_day,agency_name,agency_email from cars join agencies on agencies.id=cars.agency_id where is_available='1';";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['cars']=[];
        while($car=mysqli_fetch_assoc($result))
        $_SESSION['cars'][]=$car;
        header("Location: ../../available_cars.php?".$params);
        exit();
    } else {
        header("Location: ../../available_cars.php?notFound=true");
        exit();
    }

?>