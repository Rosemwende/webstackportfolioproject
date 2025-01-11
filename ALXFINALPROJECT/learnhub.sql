-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 05:46 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `instructor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `instructor_id`, `created_at`) VALUES
(1, 'Web Development Basics', 'Learn the foundations of web development, including HTML, CSS, and JavaScript.', 1, '2025-01-09 11:30:40'),
(2, 'Introduction to Python', 'Master the basics of Python programming and start building your own projects.', 1, '2025-01-09 11:30:40'),
(3, 'Graphic Design Essentials', 'Explore the principles of design and learn how to create stunning visuals.', 5, '2025-01-09 11:30:40'),
(4, 'Digital Marketing 101', 'Understand the fundamentals of digital marketing and how to grow your online presence.', 4, '2025-01-09 11:30:40'),
(5, 'Cybersecurity Essentials', 'Learn the fundamentals of cybersecurity, including network security, cryptography, and threat detection.', 2, '2025-01-09 11:30:40'),
(6, 'Software Engineering 101', 'Understand the key concepts of software engineering, including algorithms, data structures, and software development methodologies.', 3, '2025-01-09 11:30:40'),
(7, 'Virtual Assistant Training', 'Learn how to become an effective virtual assistant, managing tasks like scheduling, email communication, and customer service.', 3, '2025-01-09 11:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_type` varchar(50) NOT NULL DEFAULT 'Article',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`id`, `course_id`, `title`, `content`, `content_type`, `created_at`) VALUES
(1, 1, 'Introduction to HTML', 'HTML is the standard markup language for creating web pages. It provides the structure of web pages, defining elements such as headings, paragraphs, links, and images.\n\nHTML is the foundation of web development, and mastering its use is the first step in creating a website. Understanding HTML will allow you to build the structure of a page and organize your content effectively. As a beginner, learning HTML is essential for understanding how the web works.', 'Article', '2025-01-11 11:31:25'),
(2, 1, 'CSS Styling Techniques', 'CSS is used to style and layout web pages, from colors to fonts to spacing. CSS allows developers to create visually engaging and responsive web pages.\n\nCSS gives you the flexibility to style HTML elements, changing their appearance on the screen. With CSS, you can control the color scheme of a website, modify the layout to fit various screen sizes, and create user-friendly interfaces. As the internet grows more interactive and visually rich, mastering CSS is a must for web developers.\n\nLearning CSS also allows you to create responsive web designs, which automatically adjust to fit different screen sizes. This is critical in today\'s mobile-first web development environment.', 'Article', '2025-01-11 11:31:25'),
(3, 1, 'JavaScript Basics', 'JavaScript is the programming language used to create dynamic, interactive websites. It can be used to add animations, handle user input, and communicate with servers.\n\nJavaScript is what brings your website to life by enabling interaction with users. From simple tasks like form validation to more complex features like image sliders, JavaScript is essential for adding functionality to websites.\n\nIt can also be used to manipulate HTML elements directly through the Document Object Model (DOM), allowing for real-time updates on the page without refreshing. This dynamic behavior is what makes modern websites feel more interactive and engaging.', 'Article', '2025-01-11 11:31:25'),
(4, 2, 'Python Syntax Overview', 'Python is known for its readable and simple syntax. It uses indentation to define code blocks and is a great choice for beginners.\n\nPython has a clean and easy-to-read syntax that makes it a beginner-friendly programming language. Unlike many other languages, Python does not require semicolons or curly braces to structure code, which makes it easy to learn and understand.\n\nIn Python, indentation is critical because it indicates code blocks, such as loops and functions. This approach promotes readable code and helps avoid common syntax errors.\n\nOne of Python’s most powerful features is its ability to support multiple programming paradigms, including object-oriented, functional, and imperative programming.', 'Article', '2025-01-11 11:31:25'),
(5, 2, 'Python Variables and Data Types', 'In Python, variables can store different types of data like integers, floats, strings, and lists. Python’s dynamic typing makes it flexible for new developers.\n\nVariables in Python are not declared with a type, unlike many other programming languages. Instead, Python uses dynamic typing, which means variables can change type during runtime. For example, a variable can initially store an integer and later store a string or float.\n\nSome of the basic data types in Python include integers, floats, strings, and booleans. Understanding how these data types work and how to use them correctly is key to becoming a successful Python developer.', 'Article', '2025-01-11 11:31:25'),
(6, 2, 'Python Functions', 'Functions in Python allow for reusable blocks of code that perform specific tasks. Functions are defined using the \"def\" keyword and can accept parameters.\n\nFunctions are essential for organizing code and reducing redundancy. Instead of writing the same code multiple times, you can define a function that can be called with different inputs. This promotes better code structure and readability.\n\nIn Python, you can also define functions with default arguments, variable-length arguments, and keyword arguments, giving you flexibility when defining your code\'s logic. Functions are foundational to writing clean, efficient, and modular Python programs.', 'Article', '2025-01-11 11:31:25'),
(7, 3, 'Design Principles', 'Good design is based on principles such as balance, contrast, alignment, and proximity. Understanding these principles helps create aesthetically pleasing and functional designs.\n\nBalance refers to the distribution of visual weight in a design. It can be symmetrical or asymmetrical, but it ensures the elements of the design are arranged in a way that feels stable. Contrast creates visual interest and guides the viewer’s eye by highlighting differences between elements, such as color or size.\n\nAlignment ensures that the elements in a design are properly positioned relative to each other, creating a clean and organized look. Proximity refers to grouping related items together to create a sense of organization and structure within the design.', 'Article', '2025-01-11 11:31:25'),
(8, 3, 'Using Adobe Photoshop', 'Photoshop is a powerful tool used in graphic design for editing images, creating graphics, and working with typography. Learn how to use its layers, tools, and filters.\n\nOne of the most important features of Photoshop is its use of layers, which allow you to separate elements of your design for more precise editing. Layers can be arranged, resized, and edited independently, giving you maximum flexibility.\n\nPhotoshop also includes a wide variety of tools for adjusting images, such as the magic wand tool, brush tool, and gradient tool. Mastering these tools is essential for creating polished and professional designs.', 'Article', '2025-01-11 11:31:25'),
(9, 3, 'Typography Basics', 'Typography refers to the style and appearance of text. Choosing the right fonts and spacing can significantly impact the readability and mood of a design.\n\nThe font you choose can evoke certain emotions or styles in your design. For example, serif fonts are often associated with tradition, while sans-serif fonts tend to be modern and clean. Understanding how to combine fonts for hierarchy and visual interest is an important skill for any designer.\n\nIn addition to font choice, spacing and alignment are crucial aspects of typography. Proper kerning (the spacing between characters) and leading (the space between lines of text) can enhance the legibility and aesthetics of your design.', 'Article', '2025-01-11 11:31:25'),
(10, 4, 'SEO Fundamentals', 'Search Engine Optimization (SEO) involves improving website visibility in search engines. It includes strategies like keyword research, content optimization, and backlinking.\n\nSEO is crucial for ensuring that your website is discoverable by search engines like Google. Effective SEO involves optimizing content to include relevant keywords, improving the technical structure of the site, and building backlinks from authoritative websites.\n\nUnderstanding SEO also means focusing on the user experience. Search engines prioritize websites that are easy to navigate, mobile-friendly, and load quickly. Implementing SEO best practices helps ensure your website ranks highly and attracts organic traffic.', 'Article', '2025-01-11 11:31:25'),
(11, 4, 'Social Media Strategies', 'Effective social media marketing includes understanding your target audience, creating engaging content, and using platforms like Facebook, Instagram, and Twitter for promotion.\n\nSocial media is a powerful tool for reaching potential customers and growing your brand. By creating shareable content and using relevant hashtags, you can increase your visibility and build a strong following.\n\nEngagement is also key in social media marketing. Responding to comments, creating interactive polls, and running giveaways can help build a loyal community around your brand and keep your audience engaged.', 'Article', '2025-01-11 11:31:25'),
(12, 4, 'Content Marketing Basics', 'Content marketing is all about creating valuable, relevant content to attract and engage a target audience. It is key for building trust and driving conversions.\n\nContent marketing is not about direct selling; it’s about providing value to your audience through informative blog posts, videos, and social media updates. By answering questions and solving problems, you can build a relationship with potential customers.\n\nSuccessful content marketing involves creating a content strategy that aligns with your brand goals. It also requires consistency and quality in your content to establish your authority in your industry.', 'Article', '2025-01-11 11:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `enrollment_date`) VALUES
(6, 2, 2, '2025-01-11 16:11:33'),
(5, 1, 7, '2025-01-11 16:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Derrick juma', 'deri@gmail.com', '$2y$10$GiRzybAIWoSZXYDzXoQxLOKTLp.ZoSSrekxZV1H.tbiK7LTJjQ7TO', '2025-01-11 16:07:16'),
(2, 'James Juma', 'james4@gmail.com', '$2y$10$ubAdSYyqpjzRob45EhWyWOsD9iZJ4XLlrK5Wvib8XYdiIZ7EySCL2', '2025-01-11 16:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
