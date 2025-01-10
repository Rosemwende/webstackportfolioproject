<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnHub - Explore Courses</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        color: #333;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 1rem 1rem;
    }

    header h1 {
        margin: 0;
        font-size: 2rem;
        text-align: center;
    }

    nav ul {
        list-style: none;
        padding: 0;
        text-align: center;
        margin-top: 1rem;
    }

    nav ul li {
        display: inline;
        margin: 0 1rem;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 1rem;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    main {
        padding: 2rem 1rem;
        max-width: 1200px;
        margin: 0 auto;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    section {
        margin-bottom: 2rem;
    }

    section h2 {
        font-size: 2.2rem;
        color: #4CAF50;
        text-align: left;
        margin-bottom: 1rem;
    }

    section p {
        font-size: 1.1rem;
        color: #555;
        text-align: left;
        margin-top: 1rem;
        line-height: 1.6;
    }

    .about-us {
        background-color: #f9f9f9;
        padding: 1.5rem;
        border-radius: 8px;
    }

    footer {
        background-color: #4CAF50;
        text-align: center;
        padding: 1rem;
        margin-top: 2rem;
    }

    footer p {
        color: white;
        margin: 0;
        font-size: 1rem;
    }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to LearnHub</h1>
        <nav>
            <ul>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="features">
            <div class="container">
                <div class="feature">
                    <h2>Explore Our Courses</h2>
                    <p>Browse through our extensive catalog of courses and start learning today. Whether you're interested in programming, design, or business, we have something for everyone. Click on "Courses" to view more details!</p>
                </div>
            </div>
        </section>

        <section id="cta">
            <div class="container">
            <h2>About Us</h2>
            <p>LearnHub is an online learning platform dedicated to providing high-quality courses across various subjects, from programming and design to business and marketing. Our mission is to make learning accessible, flexible, and enjoyable for all learners, regardless of their background.</p>

            <h2>Our Mission</h2>
            <p>At LearnHub, our mission is to make high-quality education accessible to everyone, empowering individuals with the knowledge and skills they need to succeed in their personal and professional lives.</p>

            <h2>Our Vision</h2>
            <p>Our vision is to be the leading online learning platform, fostering a community of passionate learners who continuously grow and excel in their chosen fields, no matter their background or location.</p>

            <h2>Our Contact details</h2>
            <h4>Address - roserotash@gmail.com</h4>
            <h4>Contact no. - +254791318073</h4>
        </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 LearnHub. All rights reserved.</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>
