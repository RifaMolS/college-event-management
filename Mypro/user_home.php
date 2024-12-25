<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Hero Section */
        .hero {
            background: url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            color: white;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadeIn 2s ease-out;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0;
            animation: slideIn 2s forwards;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.8;
            animation: fadeInText 2s ease-out 0.5s forwards;
        }

        .hero a {
            margin-top: 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
            opacity: 0;
            animation: fadeInButton 2s ease-out 1s forwards;
        }

        .hero a:hover {
            background-color: #0056b3;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInText {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInButton {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Card Styling */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            animation: fadeInCard 0.8s ease-out forwards;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card img:hover {
            transform: scale(1.1);
        }

        .card-body {
            text-align: center;
        }

        .card-body h5 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body p {
            font-size: 1.1rem;
            opacity: 0.8;
        }

        .btn-primary {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Navbar Styling */
        nav {
            transition: background-color 0.3s ease;
        }

        nav:hover {
            background-color: #343a40;
        }

        /* Footer Styling */
        footer {
            background-color: #212529;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            opacity: 0;
            animation: fadeInFooter 1s ease-out 2s forwards;
        }

        /* Smooth Scroll for Navbar Links */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .card img {
                height: 150px;
            }

            .card-body h5 {
                font-size: 1.2rem;
            }

            .card-body p {
                font-size: 1rem;
            }
        }

        @keyframes fadeInCard {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInFooter {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">College Events</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event_view.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_profile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registered_events.php">Registered Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4">Welcome to College Event Management</h1>
            <p class="lead">Manage your college events with ease and keep track of upcoming activities.</p>
            <a href="#events" class="btn btn-primary btn-lg">Explore Events</a>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section id="events" class="container my-5">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div class="row">
            <!-- Event 1 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="event_view.php?id=1">
                        <img src="https://png.pngtree.com/thumb_back/fh260/background/20220314/pngtree-outdoor-entertainment-music-festival-atmosphere-shooting-image_1050327.jpg" class="card-img-top" alt="Event 1">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Music Festival</h5>
                        <p class="card-text">Join us for an unforgettable evening of music and fun.</p>
                        <a href="event_view.php?id=1" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Event 2 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="event_view.php?id=2">
                        <img src="https://www.synamedia.com/wp-content/uploads/Events_Post_SCTE_TechExpo_2024_1200x628_2024.jpg" class="card-img-top" alt="Event 2">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Tech Expo 2024</h5>
                        <p class="card-text">Explore the latest innovations in technology at our annual expo.</p>
                        <a href="event_view.php?id=2" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Event 3 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="event_view.php?id=3">
                        <img src="https://images.pexels.com/photos/3004909/pexels-photo-3004909.jpeg?cs=srgb&dl=pexels-suzyhazelwood-3004909.jpg&fm=jpg" class="card-img-top" alt="Event 3">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Art Exhibition</h5>
                        <p class="card-text">Discover beautiful artworks from talented college artists.</p>
                        <a href="event_view.php?id=3" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 College Event Management. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>