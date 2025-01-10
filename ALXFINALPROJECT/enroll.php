<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['enroll'])) {
    $course_id = $_POST['course_id'];

    $stmt = $conn->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        header('Location: profile.php');
        exit();
    } else {
        echo "Error enrolling: " . $stmt->error;
    }

    $stmt->close();
}
?>
