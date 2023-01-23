<?php
    include_once('header.php')
?>
<main>
    <div class="cont">
    <div class="login-panel">
        <h3 class="text-center text-white bg-primary">Agency Register</h3>
        <form action="/backend/auth/registeration_agencies.php" method="POST">
                <?php
                if(isset($_GET['signup'])){
                    $status=$_GET['signup'];
                    if($status=="empty"){
                        echo "<p class='text-danger text-center'>All Fields Are Required</p>";
                    }
                    elseif($status=="email"){
                        echo "<p class='text-danger text-center'>Email is not Correct.</p>";
                    }
                    elseif($status=='exist'){
                        echo "<p class='text-danger text-center'>Agency Email Already Exist</p>";
                    }
                    elseif($status=="failed"){
                        echo "<p class='text-danger text-center'>Something Went Wrong</p>";
                    }
                }
                ?>
            <div class="d-flex h-100">
                <div class="labels">
                    <div class="col-md-12">
                        <label for="agency_name">Agency Name</label>
                    </div>
                    <div class="col-md-12">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-12">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-12">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-12">
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                </div>
                <div class="fields">
                    <div class="col-md-12">
                        <input type="text" name="agency_name" id="" class="form-control" placeholder="Enter Agency Name" autofocus="true" value="<?php echo isset($_GET['agency_name']) ?$_GET['agency_name']:''; ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="<?php echo isset($_GET['name']) ?$_GET['name']:''; ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="email" name="agency_email" id="" class="form-control" placeholder="Enter Email" value="<?php echo isset($_GET['email']) ?$_GET['email']:''; ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="confirm_password" id="" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                
            </div>
            <div class="d-flex justify-content-around">
                    <a href="login_agency.php" class="btn btn-danger">Login</a>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
                
        </form>
    </div>
    </div>
</main>
<?php 
    include_once('./footer.php')
?>