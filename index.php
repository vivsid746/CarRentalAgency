<?php
    include_once('header.php')
?>
<main id="home_main">
    <div class="container-fluid p-0">
        <div class="banner">
            <img src="./assets/sur.jpg" alt="Banner">
            <div class="content">
                <div class="">
                    <div class="col-md-6 offset-md-3 p-2 text-center">
                        <span class="tagline">RideNow / RidePro</span>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="buttons d-flex justify-content-around">
                            <a class="btn btn-primary btn-big" href="./login_customers.php">Customer Login</a>
                            <a class="btn btn-primary btn-big" href="./login_agency.php">Agency Login</a>
                        </div>
                        <div class="d-flex justify-content-center my-2">
                            <a class="btn btn-primary btn-big" href="backend/customers/get_available_cars.php">Show Available Cars</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="jumbotron">
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="icon">
                <i class="fas fa-chart-line"></i>
                </div>
                <div class="text">
                India’s #1<br>
Largest Auto portal
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon">
                <i class="fas fa-thumbs-up"></i>
                </div>
                <div class="text">
                Customer <br>
Satisfaction
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon">
                <i class="fas fa-gift"></i>
                </div>
                <div class="text">
                Offers<br>
Stay updated pay less
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon">
                <i class="fas fa-car"></i>
                </div>
                <div class="text">
                Compare<br>
Decode the right car
                </div>
            </div>
            
        </div>
        </div>
    </div>
</main>
<?php 
    include_once('./footer.php')
?>