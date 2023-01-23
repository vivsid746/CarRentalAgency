<?php
    include_once('header.php');
    if(isset($_SESSION['user_id'])){
        header("Location: ../available_cars.php");
    }if(isset($_SESSION['agency_id'])){
        header("Location: /backend/agency/get_cars.php?");
        exit();
    }
?>
<main>
    <div class="cont">
    <div class="login-panel">
        <h3 class="text-center text-white bg-info">Customer Login</h3>
        <form action="backend/auth/login_customers.php" method="POST">
            <?php if(isset($_GET['signup'])){
                    if($_GET['signup']=="success"){
                        echo '<p class="text-center text-success">Registeration Successful! --> Please Login.</p>';

                    }
                }
                if(isset($_GET['failed'])){
                    if($_GET['failed']=="true"){
                        echo '<p class="text-center text-danger">Something Went Wrong!!</p>';

                    }
                }
                if(isset($_GET['access'])){
                    if($_GET['access']=="false"){
                        echo '<p class="text-center text-danger">You must be logged in as a customer to access that page!!</p>';

                    }
                }
                ?>
            <div class="d-flex h-100">
                <div class="labels">
                    <div class="col-md-12">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-12">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="fields">
                    <div class="col-md-12">
                        <input type="email" name="email" id="" class="form-control" placeholder="Enter Email" autofocus="true" value="<?php echo isset($_GET['email'])?$_GET['email']:""?>">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
            <a href="register_customers.php" class="btn btn-danger">Register</a>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    </div>
</main>
<?php 
    include_once('./footer.php')
?>