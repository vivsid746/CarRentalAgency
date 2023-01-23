<?php
    include_once('header.php');

    if(!isset($_SESSION['agency_id'])){
        header('Location: login_agency.php?access=false');
    }
?>


<main class="h70">
    <div class="container-fluid p-10">
        <div class="card m-10">
            <div class="card-header d-flex justify-content-between text-white bg-primary">
                <div>
                    Add/Edit Car (<?php echo $_SESSION['agency_name'];?>)
                </div>
                <div>

                <a href="" class="btn btn-sm btn-success" id="add_car_btn" >Add Car</a>
                </div>
            </div>
            <div class="card-body bg-warning-subtle">
                <?php
                    if(isset($_GET['notFound'])){
                        echo "<p class='text-danger text-center'>Something Went Wrong! Please Try Again</p>";    
                    }
                    elseif(isset($_GET['added'])){
                        if($_GET['added']=="success"){
                            echo "<p class='text-success text-center'>Operation Successful!!</p>";
                        }
                    }
                    elseif(isset($_GET['update'])){
                        if($_GET['update']=="success"){
                            echo "<p class='text-success text-center'>Update Successful!!</p>";
                        }
                        else{
                            echo "<p class='text-danger text-center'>Something Went Wrong!!</p>";
                        }
                    }
                    elseif(isset($_GET['delete'])){
                        if($_GET['delete']=="success"){
                            echo "<p class='text-success text-center'>Delete Successful!!</p>";
                        }
                        else{
                            echo "<p class='text-danger text-center'>Something Went Wrong!!</p>";
                        }
                    }
                    elseif(isset($_GET['rent'])){
                        if($_GET['rent']=="false"){
                            echo "<p class='text-danger text-center'>Agency Cannot Rent a Car!!</p>";
                        }
                    }
                    elseif(isset($_GET['failed'])){
                        echo "<p class='text-danger text-center'>Something Went Wrong!!</p>";
                    }
                ?>
                <div class="row">
                <?php foreach ($_SESSION['cars']??[] as $i => $car) {?>
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $car['vehicle_model']??"Bmw b6"?> <span class="text-danger"><?php if($car['is_available']??""=="0") echo "( Not Available )"?></span> </h5>
                                <h5 class="card-title"><?php echo $car['vehicle_number']??"123456"?></h5>
                                <div class="d-flex justify-content-between">
                                    <div> <span> Seatings :</span> <br><?php echo $car['no_of_seats']??"4"?></div>
                                    <div><span> Rent per Day :</span> <br> Rs. <?php echo $car['rent_per_day']??"50"?></div>
                                </div>
                                <div class="actions d-flex justify-content-between">
                                    <div class="p-2">
                                        <form action="backend/agency/get_list_of_customers.php" method="POST">
                                            <input type="hidden" name="car_id" value="<?php echo $car['id']??""?>">
                                            <button class="btn btn-sm btn-primary" name="submit" type="submit">Show Customer List</a>
                                        </form>
                                    </div>
                                    <div class="edit">
                                        <button class="btn btn-warning btn-sm m-2 edit_car_btn" data-model="<?php echo $car['vehicle_model']??"bmw"?>" data-carId="<?php echo $car['id']??""?>" data-number="<?php echo $car['vehicle_number']??"bmw"?>" data-seats="<?php echo $car['no_of_seats']??"1"?>" data-rent="<?php echo $car['rent_per_day']??"50"?>"><i class="fas fa-edit"></i></button>
                                        <form action="backend/agency/delete_car.php" method="POST">
                                        <input type="hidden" name="car_id" value="<?php echo $car['id']??""?>">
                                        <button name="submit" type="submit" class="btn btn-danger btn-sm m-2 delete_car_btn"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(count($_SESSION['cars']??[])==0){ ?>
                    <p class="text-center">No Cars Added</p>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include_once('./footer.php')
?>