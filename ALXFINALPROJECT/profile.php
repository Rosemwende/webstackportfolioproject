<?php 
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$course_query = "SELECT * FROM courses INNER JOIN enrollments ON courses.id = enrollments.course_id WHERE enrollments.user_id = '$user_id'";
$course_result = mysqli_query($conn, $course_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - LearnHub</title>
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

        header .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        header .navbar .logo h1 a {
            color: white;
            text-decoration: none;
        }

        header .navbar .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
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

        .profile-container {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            font-size: 2em;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .profile-container h3 {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-container p {
            font-size: 1em;
            color: #555;
        }

        .course-list {
            list-style-type: none;
            padding: 0;
        }

        .course-list li {
            font-size: 1.1em;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .course-list li:last-child {
            border-bottom: none;
        }

        .course-list li a {
            text-decoration: none;
            color: #4CAF50;
            transition: color 0.3s ease-in-out;
        }

        .course-list li a:hover {
            color: #45a049;
        }

        .profile-links {
            margin-top: 20px;
            text-align: center;
        }

        .profile-links a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            background-color: #f1f1f1;
            border-radius: 4px;
            transition: background 0.3s ease-in-out;
        }

        .profile-links a:hover {
            background-color: #45a049;
            color: white;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 15px;
                max-width: 90%;
            }

            .profile-container h2 {
                font-size: 1.7em;
            }

            .profile-container h3 {
                font-size: 1.1em;
            }

            .profile-container p {
                font-size: 0.9em;
            }

            header .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1><a href="index.php">LearnHub</a></h1>
            </div>
            <div class="nav-links">
                <a href="courses.php">Courses</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <h2>Welcome, <?php echo htmlspecialchars($user['email']); ?>!</h2>

        <h3>Your Enrolled Courses</h3>
        <ul class="course-list">
            <?php while ($course = mysqli_fetch_assoc($course_result)): ?>
                <li>
                    <a href="course_content.php?course_id=<?php echo $course['id']; ?>">
                        <?php echo htmlspecialchars($course['title']); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <h3>Explore More Courses</h3>
        <p><a href="courses.php">View All Courses</a></p>
    </div>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
