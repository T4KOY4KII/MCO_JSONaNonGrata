<?php
    session_start();

    if (!isset($_SESSION['name']) || $_SESSION['role'] !== 'admin') {
        header("Location: index.php");
        exit();
    }

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GreenDoorz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/DLSU_Logo_Clear_Background.png">
</head>
<body class="home-screen">
    <div class="black-fill"><br /><br />
        <div class="container">
            <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-3 shadow mb-4" id="navHome">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="images/DLSU_Logo_Clear_Background.png" width=40 class="me-2">
                        GreenDoorz
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="admin_dashboard.php?page=home">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo $page == 'about' ? 'active' : ''; ?>" href="admin_dashboard.php?page=about">
                                    About Us
                                </a>
                            </li>
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
            
            <div class="content-wrapper min-vh-75">
                <!-- Home Page -->
                <?php if ($page == 'home'): ?>
                    <div class="row g-4 mb-5">
                        <!-- To Manage Per Room Schedules -->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm position-relative action-card bg-success text-white">
                                <a href="manage_schedules.php" class="stretched-link text-decoration-none"></a>
                                <div class="card-body text-center p-5">
                                    <i class="fa fa-map-location-dot fa-4x mb-4"></i>
                                    <h2 class="card-title fw-bold">Manage Classroom Schedules</h2>
                                    <p class="card-text opacity-75">Upload and maintain schedules per classrooms.</p>
                                </div>
                            </div>
                        </div>

                        <!-- To Manage Buildings & Rooms-->
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm position-relative action-card bg-success text-white">
                                <a href="manage_buildings.php" class="stretched-link text-decoration-none"></a>
                                <div class="card-body text-center p-5">
                                    <i class="fa fa-map-location-dot fa-4x mb-4"></i>
                                    <h2 class="card-title fw-bold">Manage Building and Rooms</h2>
                                    <p class="card-text opacity-75">Update Buildings and Rooms Information.</p>
                                </div>
                            </div>
                        </div>

                    </div><br><br>
                <?php elseif ($page == 'about'): ?>
                    <!-- About Us -->
                    <section id="about" class="mb-0">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4 p-4 text-center">
                                    <img src="images/DLSU_Logo_Clear_Background.png" class="img-fluid" style="max-width: 150px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="fw-bold">About GreenDoorz</h2>
                                        <p>
                                            GreenDoorz is a collaborative study space manager for DLSU students.
                                            Our goal is to help you find quiet places to work by tracking official class schedules and real-time student occupancy.
                                        </p>
                                        <p><small class="text-muted">Developed by JSONa Non Grata</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <!-- All rights reserved text -->
            <div class="text-center text-light">
                Copyright &copy; 2026 De La Salle University. All rights reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>