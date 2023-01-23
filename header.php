<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Car Rental Agency</title>
</head>
<body>
    <header>
      <?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand col-md-20 m-0" href="index.php">Car Rental Agency</a>
    <?php if(isset($_SESSION['user_id']) || isset($_SESSION['agency_id']) ) {?>
    <div id="header-dropdown" class="col-md-2 dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <?php echo isset($_SESSION['user_id'])?$_SESSION['user_name']:$_SESSION['agency_name'];?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php if(isset($_SESSION['user_id'])){?>
          <li> <a class="dropdown-item" href="/backend/customers/get_available_cars.php">Available Cars</a></li>
          <li> <a class="dropdown-item" href="/backend/customers/get_booked_cars.php">Booked Cars</a></li>
        <?php } else {?>
          <li> <a class="dropdown-item" href="backend/agency/get_cars.php">Add Cars</a></li>
          <li> <a class="dropdown-item" href="backend/agency/get_all_bookings.php">All Bookings</a></li>
          <?php } ?>
        <li> <a class="dropdown-item" href="backend/auth/logout.php">Logout</a></li>
        
      </ul>
    </div>
  
    <?php } ?>
  </div>
</nav>
    
</header>