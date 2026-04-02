<?php

    session_start();

    if (isset($_SESSION['name'])) {
        if ($_SESSION['role'] === 'admin') {
        header("Location: admin_page.php");
        } else {
            header("Location: user_page.php");
        }
        exit();
    }
    $errors = [
        'login' => $_SESSION['login_error'] ?? null,
        'register' => $_SESSION['register_error'] ?? null
    ];
    $activeForm = $_SESSION['active_form'] ?? 'login';

    unset($_SESSION['login_error']);
    unset($_SESSION['register_error']);
    unset($_SESSION['active_form']);

    function showError($error) {
        return !empty($error) ? "<div class='error'>$error</div>" : '';
    }

    function isActiveForm($formName, $activeForm) {
        return $formName === $activeForm ? 'active' : '';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Classroom Availability System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="login">
        <div class="container">
            <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
                <form action="login_register.php" method="post">
                    <div class="brand">
                        <img src="images/DLSU_Logo_Clear_Background.png" alt="Logo">
                        <h3>GreenDoorz</h3>
                    </div>
                    <h2>Login</h2>
                    <?= showError($errors['login']); ?>
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                    <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
                </form>
            </div>

            <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
                <form action="login_register.php" method="post">
                    <div class="brand">
                        <img src="images/DLSU_Logo_Clear_Background.png" alt="Logo">
                        <h3>GreenDoorz</h3>
                    </div>
                    <h2>Register</h2>
                    <?= showError($errors['register']); ?> 
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" required>
                        <option value="">Select Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" name="register">Register</button>
                    <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
                </form>
            </div>

            <div class="footer">
                Copyright &copy; 2026 De La Salle University. All rights reserved.
            </div>
        </div>
    <script src="script.js"></script>
</body>
</html>
