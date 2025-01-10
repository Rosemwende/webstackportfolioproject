<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to enroll.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $user_id = $_SESSION['user_id'];

    $check_query = "SELECT * FROM enrollments WHERE user_id='$user_id' AND course_id='$course_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo json_encode(['success' => false, 'message' => 'You are already enrolled in this course.']);
    } else {
        $enroll_query = "INSERT INTO enrollments (user_id, course_id) VALUES ('$user_id', '$course_id')";
        if (mysqli_query($conn, $enroll_query)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to enroll in the course.']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
