<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GreenDoorz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/DLSU_Logo_Clear_Background.png">
</head>
<body class="home-screen">
    <div class="black-fill"><br />
        <div class="container">
            <!-- Navigation Bar -->
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
                            <li class="nav-item"><a class="nav-link" href="user_dashboard.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#">About Us</a></li>
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

            <!-- Contact Support -->
            <section id="contact" class="welcome-text bg-white p-4 rounded shadow-sm mt-3 mb-5">
                <form>
                    <h3 class="mb-4">Contact Support</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">DLSU Email address</label>
                            <input type="email" class="form-control" placeholder="juan_delacruz@dlsu.edu.ph">
                            <div class="form-text text-muted">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Juan Dela Cruz">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Issue / Inquiry</label>
                        <textarea class="form-control" rows="4" placeholder="Report an unscheduled event or technical issue..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send Message</button>
                </form>
            </section>

            <!-- All rights reserved text -->
            <div class="text-center text-light pb-4">
                Copyright &copy; 2026 De La Salle University. All rights reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>