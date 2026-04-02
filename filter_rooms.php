<?php
    session_start();
    require_once "users_db.php";

    if (!isset($_SESSION['name'])) {
        header("Location: index.php");
        exit();
    }

    $building = isset($_GET['building']) ? $_GET['building'] : '';
    $floor = isset($_GET['floor']) ? $_GET['floor'] : '';

    $sql = "SELECT * FROM rooms WHERE 1=1";

    if ($building != '') {
        $sql .= " AND building = '" . $conn->real_escape_string($building) . "'";
    }
    if ($floor != '') {
        $sql .= " AND floor = '" . $conn->real_escape_string($floor) . "'";
    }

    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation - GreenDoorz</title>
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
                            <li class="nav-item"><a class="nav-link" href="about_us.php">About</a></li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fa fa-user-circle"></i> 
                                    <?php echo htmlspecialchars($_SESSION['name']); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Filter Form -->
            <section id="filter-form" class="welcome-text bg-white px-4 py-3 rounded shadow-sm mt-3 mb-2">
                <form>
                    <h3 class="mb-3">New Reservation</h3>

                    <div class="row mb-4 align-items-center">
                        <label class="col-sm-2 text-end fw-bold">Building</label>
                        <div class="col-sm-8">
                            <select class="form-select text-muted required">
                                <option selected>Select a Building</option>
                                <option value="GK">Gokongwei (GK)</option>
                                <option value="AG">Andrew Gonzalez (AG)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4 align-items-center">
                        <label class="col-sm-2 text-end fw-bold">Floor</label>
                        <div class="col-sm-8">
                            <select class="form-select text-muted required">
                                <option selected>Select the floor</option>
                                <option value="1">Floor 1</option>
                                <option value="2">Floor 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-2"></div> <div class="col-sm-8">
                            <button type="submit" class="btn btn-success px-4 py-2">Show Availability</button>
                        </div>
                    </div>
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