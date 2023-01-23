<?php
    require('../db.php');
    if(!isset($_POST['submit'])){
        header("Location: ../../index.php");
        exit();
    }
    
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $confirm_password=mysqli_real_escape_string($con,$_POST['confirm_password']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
   
    if(empty($name) || empty($email) || empty($password)){
        header("Location: ../../register_customers.php?signup=empty");
        exit();
    }
    else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../../register_customers.php?signup=email");
            exit();
        }
        else{
            $query="Select * from customers where email='$email';";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                header("Location: ../../register_customers.php?signup=exist&name=".$name."&email=".$email);
                exit();
            }
            $query    = "INSERT into `customers` (name, password, email)
                     VALUES ('$name', '" . md5($password) . "', '$email')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                header("Location: ../../login_customers.php?signup=success");
                exit();
            } else {
                header("Location: ../../register_customers.php?signup=failed&name=".$name."&email=".$email);
                exit();
            }
        }
    }
   
    

    

?>