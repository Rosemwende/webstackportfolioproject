<?php 
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Account created successfully! Please log in.');</script>";
                header('Location: login.php');
                exit();
            } else {
                echo "<script>alert('Error creating account. Please try again.');</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Error preparing statement.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LearnHub</title>
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

        section {
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
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

        form p {
            text-align: center;
            font-size: 0.9rem;
            color: #333;
        }

        form p a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        form p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            section {
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

    <section>
        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
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
