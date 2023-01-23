<?php
    include_once('header.php');
    // if(!isset($_SESSION['user_id'])){
    //     header('Location: backend/customers/get_available_cars.php');
    // }
?>
<main class="h70">
    <div class="container-fluid p-10">
        <div class="card m-10">
            <div class="card-header bg-primary">
                <div class="text-white">
                    Available Cars
                </div>
                
            </div>
            <div class="card-body bg-warning-subtle">
                <p class="text-center text-danger"><?php 
                if(isset($_GET['notFound'])){
                    if($_GET['notFound']=="true"){
                        echo "Something Went Wrong. Please Try Again!.";
                    }
                }
                ?></p>
                <?php
                if(isset($_GET['booked'])){
                    if($_GET['booked']=="true"){
                        echo "<p class='text-center text-success'>Car Rented Successfully!</p>";
                    }
                }
                if(isset($_GET['access'])){
                    if($_GET['access']=="false"){
                        echo '<p class="text-center text-danger">You Must be Logged in as a Agency to Access that Page.</p>';

                    }
                }

                ?>
                <div class="row">
                <?php foreach ($_SESSION['cars']??[] as $i => $car) {?>
                    <div class="col-md-4 my-3">
                        <div class="card">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $car['vehicle_model']??"Bmw b6"?>
                                <?php echo $car['vehicle_number']??"123456"?></h5>
                                <div class="d-flex justify-content-between">
                                    <div> <span> Seatings : </span> <?php echo $car['no_of_seats']??"4"?></div>
                                    <div><span> Rent per Day : </span> Rs. <?php echo $car['rent_per_day']??"50"?></div>
                                </div>
                                <?php if(isset($_SESSION['user_id'])){?>
                                <form action="backend/customers/rent_car.php" method="POST">
                                    <input type="hidden" name="car_id" value="<?php echo $car['id']??""?>">
                                    <div class="form-group my-2">
                                        <select name="no_of_days" id="" class="form-control" required>
                                            <option value="">Select Number of Days</option>
                                            <?php for ($i=1; $i <11 ; $i++) {?> 
                                                <option value="<?php echo $i?>"><?php echo $i?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="date" name="start_date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>" id="start_date" class="form-control">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                    <div>From : <?php echo $car['agency_name']?></div>
                                    <button type="submit" name="rent_car" class=" btn btn-sm btn-danger">Rent Car</button>
                                    </div>
                            </form>
                                <?php } else{ ?>
                                    <div class="d-flex justify-content-end">
                                <a href="login_customers.php" name="rent_car" class="float-right btn btn-sm btn-danger">Rent Car</a>
                                </div>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(count($_SESSION['cars']??[])==0){ ?>
                    <p class="text-center">No Available Cars</p>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
    include_once('./footer.php')
?>