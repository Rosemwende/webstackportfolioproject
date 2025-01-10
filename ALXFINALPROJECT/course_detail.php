<?php
session_start();
include('db.php');

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $course_id = mysqli_real_escape_string($conn, $course_id);

    $query = "SELECT * FROM courses WHERE id = '$course_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching course details: " . mysqli_error($conn));
    }

    $course = mysqli_fetch_assoc($result);

    if (!$course) {
        echo "Course not found!";
        exit();
    }
} else {
    echo "No course selected!";
    exit();
}

if (isset($_POST['enroll'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $enroll_query = "INSERT INTO enrollments (user_id, course_id) VALUES ('$user_id', '$course_id')";
        if (mysqli_query($conn, $enroll_query)) {
            echo "<script>alert('You have successfully enrolled in the course!'); window.location.href = 'profile.php';</script>";
        } else {
            die("Error enrolling in course: " . mysqli_error($conn));
        }
    } else {
        echo "<script>alert('You must be logged in to enroll.'); window.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - LearnHub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1><a href="index.php">LearnHub</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1><?php echo htmlspecialchars($course['title']); ?></h1>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($course['description'])); ?></p>

        <form action="course_detail.php?course_id=<?php echo $course_id; ?>" method="POST">
            <button type="submit" name="enroll">Enroll in this Course</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
