<?php
    session_start();

    if (!isset($_SESSION['name'])) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GreenDoorz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/DLSU_Logo_Clear_Background.png">
</head>
<body class="home-screen">
    <div class="black-fill"><br />
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-3 shadow mb-4" id="navHome">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="images/DLSU_Logo_Clear_Background.png" width="40" class="me-2">
                        GreenDoorz
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fa fa-user-circle"></i> 
                                    <?php echo htmlspecialchars($_SESSION['name']); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm position-relative action-card bg-success text-white">
                        <a href="view_availability.php" class="stretched-link text-decoration-none"></a>
                        <div class="card-body text-center p-5">
                            <i class="fa fa-map-location-dot fa-4x mb-4"></i>
                            <h2 class="card-title fw-bold">Check Rooms Availabity</h2>
                            <p class="card-text opacity-75">Check which rooms in GK and AG are currently available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm position-relative action-card bg-success text-white">
                        <a href="reserve_seat.php" class="stretched-link text-decoration-none"></a>
                        <div class="card-body text-center p-5">
                            <i class="fa fa-chair fa-4x mb-4"></i>
                            <h2 class="card-title fw-bold">Reserve a Seat</h2>
                            <p class="card-text opacity-75">Find an available room and reserve a seat for your study session.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm position-relative action-card bg-success text-white">
                        <a href="my_reservations.php" class="stretched-link text-decoration-none"></a>
                        <div class="card-body text-center p-5">
                            <i class="fa fa-calendar-check fa-4x mb-4"></i>
                            <h2 class="card-title fw-bold">My Bookings</h2>
                            <p class="card-text opacity-75">View your active reservations and history of saved seats.</p>
                        </div>
                    </div>
                </div>
            </div><br><br>

            <div class="text-center text-light pb-4">
                Copyright &copy; 2026 De La Salle University. All rights reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>