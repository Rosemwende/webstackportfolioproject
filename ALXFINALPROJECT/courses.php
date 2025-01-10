<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to enroll in courses.');
}

$query = "SELECT * FROM courses";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching courses: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - LearnHub</title>
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
        .available-courses {
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .available-courses h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .course-item {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-5px);
        }

        .course-item h3 {
            font-size: 1.6em;
            color: #333;
            margin-bottom: 10px;
        }

        .course-item p {
            font-size: 1em;
            color: #555;
        }

        .course-item .view-details {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 15px;
            font-weight: bold;
        }

        .course-item .view-details:hover {
            background-color: #45a049;
        }

        .courses-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 0;
            padding: 2rem 0;
        }

        .course-card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: box-shadow 0.3s ease-in-out;
        }

        .course-card:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .course-card h3 {
            color: #4CAF50;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }

        .course-card p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .course-card button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .course-card button:hover {
            background: #45a049;
        }

        @media (max-width: 768px) {
            .available-courses h2 {
                font-size: 1.5em;
            }

            .course-item {
                padding: 15px;
            }

            .course-item h3 {
                font-size: 1.4em;
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
            <div class="logout">
            <a href="logout.php" style="color: white; text-decoration: none; font-weight: bold;">Logout</a>
            <a href="profile.php" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">Profile</a>
        </div>
        </div>
    </header>

    <main>
        <section class="available-courses">
            <h2>Available Courses</h2>
            <p>Browse through our extensive catalog of courses and start learning today. Whether you're interested in programming, design, or business, we have something for everyone.</p>
        </section>

        <section class="courses-list">
            <div class="course-card">
                <h3>Web Development Basics</h3>
                <p>Learn the foundations of web development, including HTML, CSS, and JavaScript.</p>
                <button onclick="enroll('web-development')">Enroll Now</button>
            </div>

            <div class="course-card">
                <h3>Introduction to Python</h3>
                <p>Master the basics of Python programming and start building your own projects.</p>
                <button onclick="enroll('python')">Enroll Now</button>
            </div>

            <div class="course-card">
                <h3>Graphic Design Essentials</h3>
                <p>Explore the principles of design and learn how to create stunning visuals.</p>
                <button onclick="enroll('graphic-design')">Enroll Now</button>
            </div>

            <div class="course-card">
                <h3>Digital Marketing 101</h3>
                <p>Understand the fundamentals of digital marketing and how to grow your online presence.</p>
                <button onclick="enroll('digital-marketing')">Enroll Now</button>
            </div>

            <?php while ($course = mysqli_fetch_assoc($result)): ?>
                <div class="course-item">
                    <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>

                    <form action="process_enrollment.php" method="POST">
                        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                        <button type="submit" name="enroll">Enroll Now</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: "process_enrollment.php",
                    data: form.serialize(),
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('You have successfully enrolled!');
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function() {
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>
</body>
</html>
