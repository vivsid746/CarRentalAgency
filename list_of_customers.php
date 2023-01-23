<?php
    include_once('header.php');
    if(!isset($_SESSION['agency_id'])){
        header('Location: login_agency.php?access=false');
        exit();
    }

    if(!isset($_SESSION['particular_car'])){
        header('Location: backend/get_cars.php?added=failed');
        exit();
    }

?>
<main class="h70">
    <div class="container-fluid p-10">
        <div class="card m-10">
            <div class="card-header d-flex justify-content-between">
                <div>
                    List of Users Booked <?php echo $_SESSION['particular_car']['vehicle_model']." ".$_SESSION['particular_car']['vehicle_number'];?>
                </div>
                <a class="btn btn-sm btn-secondary float-right" href="backend/agency/get_cars.php">back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Number Of Days</th>
                            <th>Start Date</th>
                            <th>Booked Date & Time</th>
                        </tr>
                        <?php foreach ($_SESSION['booked_cars']??[] as $i => $order) {?>
                            <tr>
                                <td><?php echo $order['user']['name']??""?></td>
                                <td><?php echo $order['user']['email']??""?></td>
                                <td><?php echo $order['no_of_days']??"bmw"?></td>
                                <td><?php echo $order['start_date']??"12/08/2021"?></td>
                                <td><?php echo $order['created_at']??"12/05/2001"?></td>
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