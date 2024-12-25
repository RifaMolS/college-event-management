<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Event Management - Coordinator Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <style>
     /* Global Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  color: #333;
}

a {
  text-decoration: none;
  color: #007bff;
}

header {
  background-color: #333;
  color: #fff;
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header .logo img {
  height: 50px;
}

header .nav ul {
  list-style: none;
  display: flex;
  gap: 1rem;
}

header .nav ul li a {
  color: white;
  padding: 0.5rem;
}

.header .nav ul li a:hover {
  background-color: #007bff;
  border-radius: 5px;
}

/* Hero Section */
.hero {
  background: url('https://cdn.pixabay.com/photo/2016/05/27/08/51/mobile-phone-1419275_1280.jpghttps://cdn.pixabay.com/photo/2016/05/27/08/51/mobile-phone-1419275_1280.jpg') no-repeat center center/cover;
  color: white;
  padding: 5rem 2rem;
  text-align: center;
}

.hero h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
}

.hero p {
  font-size: 1.5rem;
  margin-bottom: 2rem;
}

.hero-buttons .btn {
  background-color: #007bff;
  color: white;
  padding: 1rem 2rem;
  margin: 0.5rem;
  border-radius: 5px;
  display: inline-block;
}

.hero-buttons .btn:hover {
  background-color: #0056b3;
}

/* Quick Stats Section */
.quick-stats {
  display: flex;
  justify-content: space-around;
  padding: 2rem;
  background-color: #fff;
}

.quick-stats .stat {
  background-color: #007bff;
  color: white;
  padding: 1.5rem;
  border-radius: 10px;
  text-align: center;
}

.quick-stats .stat h2 {
  margin-bottom: 0.5rem;
}

/* Event Calendar */
.event-calendar {
  padding: 2rem;
}

#calendar {
  height: 300px;
  background-color: #eaeaea;
}

/* Recent Activity Feed */
.recent-activity {
  background-color: #fff;
  padding: 2rem;
}

.recent-activity ul {
  list-style: none;
  padding: 0;
}

.recent-activity ul li {
  padding: 0.5rem 0;
  border-bottom: 1px solid #ddd;
}

/* Resource Center */
.resource-center {
  padding: 2rem;
}

.resource-center .resources {
  display: flex;
  gap: 2rem;
}

.resource-center a {
  background-color: #007bff;
  color: white;
  padding: 1rem 2rem;
  border-radius: 5px;
}

/* Footer */
.footer {
  background-color: #333;
  color: white;
  padding: 1rem;
  text-align: center;
}

.footer-links a {
  color: white;
  margin: 0 1rem;
}

</style>
<script>
   // Example: This could be used for interactive features
document.addEventListener("DOMContentLoaded", function () {
  // Placeholder logic for notifications or other dynamic content
  console.log("Page loaded, ready for action.");
  
  // Example: Quick stats interactivity (could fetch live data here)
  const stats = document.querySelectorAll('.stat');
  stats.forEach(stat => {
    stat.addEventListener('click', function() {
      alert(`You clicked on ${stat.querySelector('h2').textContent}`);
    });
  });
  
  // Event calendar logic can be integrated here (using plugins like FullCalendar.io)
});

</script>
</head>
<body>

  <!-- Header -->
  <header class="header">
    <div class="logo">
      <img src="https://e7.pngegg.com/pngimages/359/743/png-clipart-logo-community-text-logo.png" alt="College Logo">
    </div>
    <nav class="nav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="event_registration.php">Create Event</a></li>
        <li><a href="view_eventreg">Manage Events</a></li>
        <li><a href="view_eventreg.php">View Registered Events</a></li>
        <li><a href="#">Event Calendar</a></li>
        <li><a href="#">Resources</a></li>
        <li><a href="#">Contact Support</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">🔔</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Welcome, [Event Coordinator Name]!</h1>
    <p>"The best way to predict the future is to create it." - Abraham Lincoln</p>
    <div class="hero-buttons">
      <a href="#" class="btn">📅 Create a New Event</a>
      <a href="#" class="btn">🎉 View Upcoming Events</a>
      <a href="#" class="btn">🛠️ Manage Your Team</a>
    </div>
  </section>

  <!-- Quick Stats Section -->
  <section class="quick-stats">
    <div class="stat">
      <h2>Upcoming Events</h2>
      <p>12</p>
    </div>
    <div class="stat">
      <h2>Registrations</h2>
      <p>450</p>
    </div>
    <div class="stat">
      <h2>Team Members</h2>
      <p>6</p>
    </div>
    <div class="stat">
      <h2>Tasks Due Soon</h2>
      <p>3</p>
    </div>
    <div class="stat">
      <h2>Budget Overview</h2>
      <p>$2,500</p>
    </div>
  </section>

  <!-- Event Calendar -->
  <section class="event-calendar">
    <h2>Your Event Calendar</h2>
    <div id="calendar">
      <!-- Placeholder for calendar widget -->
    </div>
  </section>

  <!-- Recent Activity Feed -->
  <section class="recent-activity">
    <h2>Recent Activity</h2>
    <ul>
      <li>John Doe added a new team member to [Event Name].</li>
      <li>The venue for [Event Name] has been confirmed.</li>
      <li>30 new registrations for [Event Name].</li>
      <li>Budget for [Event Name] has been updated.</li>
    </ul>
  </section>

  <!-- Resource Center -->
  <section class="resource-center">
    <h2>Resource Center</h2>
    <div class="resources">
      <a href="#">Templates</a>
      <a href="#">Event Guidelines</a>
      <a href="#">FAQs</a>
      <a href="#">Training Modules</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2024 College Event Management System. All Rights Reserved.</p>
    <div class="footer-links">
      <a href="#">Contact Support</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>
