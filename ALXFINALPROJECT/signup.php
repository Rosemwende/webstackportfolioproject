<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
            $error_message = "Please fill all required fields.";
        } elseif ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $fullname, $email, $hashed_password);

                if ($stmt->execute()) {
                    header('Location: login.php');
                    exit();
                } else {
                    $error_message = "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $error_message = "Error preparing statement: " . $conn->error;
            }
        }
    } else {
        $error_message = "Please fill all required fields.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LearnHub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1><a href="index.php">Home</a></h1>
                <h1><a href="#">LearnHub</a></h1>
            </div>
        </div>
    </header>

    <section>
        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
            <?php if (!empty($error_message)): ?>
                <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
