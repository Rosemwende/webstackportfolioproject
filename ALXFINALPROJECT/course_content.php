<?php
include('db.php');

if (!isset($_GET['course_id'])) {
    die("Course ID not provided.");
}

$course_id = $_GET['course_id'];

$query = "SELECT * FROM course_content WHERE course_id = ?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("SQL Error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'i', $course_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['content'];
    }
} else {
    echo "Access Denied: You are not enrolled in this course.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Content</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Course Content</h1>
    </header>
    <main>
        <?php while ($content = $content_result->fetch_assoc()): ?>
            <section>
                <h2><?php echo htmlspecialchars($content['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($content['description'])); ?></p>
                <a href="<?php echo htmlspecialchars($content['content_url']); ?>" target="_blank">View Content</a>
            </section>
        <?php endwhile; ?>
    </main>
    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
