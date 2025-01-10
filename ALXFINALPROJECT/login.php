<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            header('Location: profile.php');
            exit();
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LearnHub</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            padding: 1em 0;
            text-align: center;
            color: white;
        }

        header .navbar .logo h1 a {
            color: white;
            text-decoration: none;
        }

        footer {
            text-align: center;
            padding: 1em 0;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            padding: 20px;
            max-width: 400px;
            margin: 50px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            font-size: 1.5em;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        form label {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
            box-sizing: border-box;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        form button:hover {
            background-color: #45a049;
        }

        .signup-prompt {
            text-align: center;
            margin-top: 15px;
        }

        .signup-prompt a {
            color: #4CAF50;
            text-decoration: none;
        }

        .signup-prompt a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            form {
                padding: 15px;
                max-width: 80%;
            }

            form h2 {
                font-size: 1.3em;
            }

            form label, form input {
                font-size: 0.85rem;
            }

            form button {
                font-size: 0.9rem;
            }
        }
    </style>
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

    <form action="login.php" method="POST">
        <h2>Login</h2>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>

        <div class="signup-prompt">
            <p>If you don't have an account, <a href="signup.php">Sign up</a></p>
        </div>
    </form>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
