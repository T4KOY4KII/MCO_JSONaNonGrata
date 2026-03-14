<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GreenDoorz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/DLSU_Logo_Clear_Background.png">
</head>
<body class="login-screen">
    <div class="black-fill"><br /><br />
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login"
                  method="post"
                  action="req/login.php">
                <div class="text-center">
                    <img src="images/DLSU_Logo_Clear_Background.png"
                         width="100">
                </div>
                <h3>GreenDoorz</h3>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="email" class="form-control"
                           name="uname">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control"
                           name="pass">
                </div>

                <div class="mb-3">
                    <label class="form-label">Login As</label>
                    <select class="form-control"
                            name="role">
                        <option value="1">Admin</option>
                        <option value="2">Student</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" class="text-decoration-none">Home</a>
            </form>

            <br /><br />
            <div class="text-center text-light">
                Copyright &copy; 2026 De La Salle University. All rights reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>