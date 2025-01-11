<?php
include('db.php');

if (!isset($_GET['course_id'])) {
    die("Course ID not provided.");
}

$course_id = $_GET['course_id'];

$course_query = "SELECT title, description FROM courses WHERE id = ?";
$course_stmt = mysqli_prepare($conn, $course_query);

if (!$course_stmt) {
    die("SQL Error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($course_stmt, 'i', $course_id);
mysqli_stmt_execute($course_stmt);

$course_result = mysqli_stmt_get_result($course_stmt);
$course = mysqli_fetch_assoc($course_result);

$content_query = "SELECT title, content FROM course_content WHERE course_id = ? AND content_type = 'Article'";
$content_stmt = mysqli_prepare($conn, $content_query);

if (!$content_stmt) {
    die("SQL Error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($content_stmt, 'i', $course_id);
mysqli_stmt_execute($content_stmt);

$content_result = mysqli_stmt_get_result($content_stmt);

$course_content = [];
while ($row = mysqli_fetch_assoc($content_result)) {
    $course_content[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Content - <?php echo htmlspecialchars($course['title']); ?></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

         body {
            font-family: Arial, sans-serif;
            background-color: #4CAF50;
            color: #333;
            line-height: 1.6;
            padding: 0;
        }

        header {
            text-align: center;
            background-color: rgba(0, 123, 255, 0.7);
            color: white;
            padding: 20px;
        }

        header h1 {
            margin-bottom: 10px;
            font-size: 30px;
        }

        header p {
            font-size: 18px;
        }

        main {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .course-content {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }

        .course-content p {
            margin-bottom: 15px;
            line-height: 1.8;
            color: #555;
        }

        .course-content h2, .course-content h3 {
            font-size: 22px;
            font-weight: bold;
            color: #222;
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .course-content h3 {
            font-size: 18px;
            margin-top: 15px;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: rgba(0, 123, 255, 0.7);
            color: white;
            margin-top: 40px;
        }

        footer p {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            main {
                padding: 15px;
                margin: 10px;
            }

            .course-content h2, .course-content h3 {
                font-size: 20px;
            }

            .course-content p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Course Content</h1>
        <li><a href="profile.php">Profile</a></li>

    </header>

    <main class="course-content">
        <h2>Course Title: <?php echo htmlspecialchars($course['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>

        <?php if (!empty($course_content)): ?>
            <?php foreach ($course_content as $content): ?>
                <h3><?php echo htmlspecialchars($content['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($content['content'])); ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No articles available for this course.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>
</body>
</html>
