<?php
    include_once('header.php');
    if(!isset($_SESSION['user_id'])){
        header('Location: login_customers.php?access=false');
    }
?>
<main class="h70">
    <div class="container-fluid p-10">
        <div class="card m-10">
            <div class="card-header d-flex justify-content-between text-white bg-primary">
                <div >
                    List of Users Booked Cars
                </div>
                <a href="backend/customers/get_available_cars.php" class="btn btn-sm btn-secondary float-right">back</a>
            </div>
            <div class="card-body bg-warning-subtle">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Agency Name</th>
                            <th>Car Model</th>
                            <th>Car Number</th>
                            <th>Seats</th>
                            <th>Rent Per Day</th>
                            <th>Number Of Days</th>
                            <th>Start Date</th>
                            <th>Booked Date & Time</th>
                        </tr>
                        <?php foreach ($_SESSION['bookings']??[] as $i => $booking) {?>
                            <tr>
                                <td><?php echo $booking['agency']['agency_name']??""?></td>
                                <td><?php echo $booking['vehicle_model']??""?></td>
                                <td><?php echo $booking['vehicle_number']??""?></td>
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