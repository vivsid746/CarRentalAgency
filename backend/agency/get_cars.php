<?php
    require('../db.php');
    session_start();
    if(!isset($_SESSION['agency_id'])){
        header("Location: ../login_agency.php?access=false");
        exit();
    }
    $params=explode("?",$_SERVER['REQUEST_URI'])[1];
    $agency_id=$_SESSION['agency_id'];
    $query    = "select * from cars where agency_id='$agency_id';";
    $result   = mysqli_query($con, $query);
    $failed=isset($_GET['failed'])?$_GET['failed']:"false";
    if ($result && $failed!="true") {
        $_SESSION['cars']=[];
        while($car=mysqli_fetch_assoc($result))
        $_SESSION['cars'][]=$car;
        header("Location: ../../add_car.php?".$params);
        exit();
    } else {
        header("Location: ../../add_car.php?failed=true");
        exit();
    }

?>