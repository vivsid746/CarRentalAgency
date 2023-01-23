<?php
    require('../db.php');
    if(!isset($_POST['submit'])){
        header("Location: ../../index.php");
        exit();
    }
    
    $agency_name = mysqli_real_escape_string($con,$_POST['agency_name']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['agency_email']);
    $confirm_password=mysqli_real_escape_string($con,$_POST['confirm_password']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
   
    if(empty($name) || empty($agency_name) || empty($email) || empty($password)){
        header("Location: ../../register_agency.php?signup=empty&agency_name=".$agency_name."&email=".$email."&name=".$name);
        exit();
    }
    else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../../register_agency.php?signup=email&agency_name=".$agency_name."&name=".$name);
            exit();
        }
        else{
            $query="select * from agencies where agency_email='$email';";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                header("Location: ../../register_agency.php?signup=exist&agency_name=".$agency_name."&email=".$email."&name=".$name);
                exit();
            }
            $query    = "INSERT into `agencies` (agency_name,name, password, agency_email)
                     VALUES ('$agency_name', '$name','" . md5($password) . "', '$email')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                header("Location: ../../login_agency.php?signup=success");
                exit();
            } else {
                header("Location: ../../register_agency.php?signup=failed&agency_name=".$agency_name."&email=".$email."&name=".$name);
                exit();
            }
        }
    }
   
    

    

?>