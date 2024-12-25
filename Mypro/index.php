<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event Management System</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f9;
        }

        /* Header Styling */
        .header {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo h1 {
            font-size: 24px;
        }

        /* Style the navbar */
        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333; /* Navbar background color */
            display: flex;
            align-items: center;
        }

        /* Style each item in the navbar */
        .navbar li {
            position: relative; /* Ensure dropdown is positioned correctly */
        }

        /* Style the links inside the navbar */
        .navbar li a, .dropbtn {
            display: inline-block;
            color: white; /* Text color */
            text-align: center;
            padding: 14px 16px; /* Spacing */
            text-decoration: none; /* Remove underline */
        }

        /* Change color of links on hover */
        .navbar li a:hover, .dropdown:hover .dropbtn {
            background-color: white;
            color: black;
        }

        /* Dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: green;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Shadow effect */
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: blue; /* Dropdown text color */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Show the dropdown content on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero .hero-content {
            z-index: 1;
        }

        .hero .hero-content h2 {
            font-size: 40px;
        }

        .hero .hero-content p {
            font-size: 18px;
            margin: 20px 0;
        }

        .hero .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .hero .cta-buttons a {
            padding: 12px 25px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hero .cta-buttons .btn-primary {
            background-color: #333;
            color: white;
        }

        .hero .cta-buttons .btn-primary:hover {
            background-color: #555;
        }

        .hero .cta-buttons .btn-secondary {
            background-color: #f4f4f9;
            color: #333;
            border: 1px solid #333;
        }

        .hero .cta-buttons .btn-secondary:hover {
            background-color: #ddd;
        }

        /* Registration Section */
        .registration {
            padding: 50px 0;
            background-color: #fff;
            text-align: center;
        }

        .registration .container {
            width: 80%;
            margin: 0 auto;
        }

        .registration h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .registration p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .registration .btn-primary {
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .registration .btn-primary:hover {
            background-color: #45a049;
        }

        /* Login Section */
        .login {
            background-color: #f4f4f9;
            padding: 50px 0;
            text-align: center;
        }

        .login .container {
            width: 80%;
            margin: 0 auto;
        }

        .login h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .login p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .login .btn-primary {
            padding: 12px 25px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .login .btn-primary:hover {
            background-color: #555;
        }

        /* Footer Styling */
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <div class="logo">
            <h1>College Events</h1>
        </div>
        <nav>
            <ul class="navbar">
                <li class="dropdown">
                    <a href="#" class="dropbtn">Register</a>
                    <div class="dropdown-content">
                        <a href="user_reg.php?type=student">Student</a>
                        <a href="eventcord_reg.php?type=coordinator">Event Coordinator</a>
                        <a href="admin_reg.php?type=admin">Admin</a>
                    </div>
                </li>
                <li><a href="login.php">Login</a></li>
                <li><a href="view.php">View</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Video Background -->
        <video autoplay muted loop>
            <source src="https://videos.pexels.com/video-files/4916733/4916733-hd_1920_1080_30fps.mp4">
            Your browser does not support the video tag.
        </video>

        <div class="hero-content">
            <h2>Welcome to the College Event Management System</h2>
            <p>Stay updated on all upcoming college events and easily manage your participation.</p>
            <div class="cta-buttons">
                <a href='.php' class="btn-primary">Register for Events</a>
                <a href='login.php' class="btn-secondary">Login to Your Account</a>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="registration">
        <div class="container">
            <h2>Register for Upcoming Events</h2>
            <p>Click the button below to register for events happening at the college:</p>
            <a href='event_reg.php' class="btn-primary">Register Now</a>
        </div>
    </section>

    <!-- Login Section -->
    <section id="login" class="login">
        <div class="container">
            <h2>Login to Your Account</h2>
            <p>Already have an account? Login below to manage your event registrations.</p>
            <a href='login.php' class="btn-primary">Login</a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 College Event Management System</p>
            <p>Contact us: <a href=''>events@college.com</a></p>
        </div>
    </footer>

</body>
</html>
