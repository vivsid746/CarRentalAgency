<?php
    include_once('header.php');
    if(!isset($_SESSION['agency_id'])){
        header('Location: login_agency.php?access=false');
        exit();
    }

?>
<main class="h70">
    <div class="container-fluid p-10">
        <div class="card m-10">
            <div class="card-header d-flex justify-content-between text-white bg-primary">
                <div>
                    List of All Bookings 
                </div>
                <a class="btn btn-sm btn-secondary float-right" href="backend/agency/get_cars.php">back</a>
            </div>
            <div class="card-body bg-warning-subtle">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Vehicle Model & Number</th>
                            <th>Number of Seats</th>
                            <th>Rent Per Day</th>
                            <th>Number Of Days</th>
                            <th>Start Date</th>
                            <th>Booked Date & Time</th>
                        </tr>
                        <?php foreach ($_SESSION['booked_cars']??[] as $i => $booking) {?>
                            <tr>
                                <td><?php echo $booking['user']['name']??""?></td>
                                <td><?php echo $booking['user']['email']??""?></td>
                                <td><?php echo $booking['vehicle_model']??""." ".$booking['vehicle_number']??""?></td>
                                <td><?php echo $booking['no_of_seats']??""?></td>
                                <td><?php echo $booking['rent_per_day']??""?></td>
                                <td><?php echo $booking['no_of_days']??""?></td>
                                <td><?php echo $booking['start_date']??""?></td>
                                <td><?php echo $booking['created_at']??""?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
    include_once('./footer.php')
?>