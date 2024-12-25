<?php
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the logged-in user's name and email from the session
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $event_name = $_POST['event_name'];
    $applicant_name = $_POST['applicant_name'];  // Get the name from the session (logged-in user)
    $applicant_email = $_POST['applicant_email']; // Get the email from the session (logged-in user)
    $applicant_phone = $_POST['applicant_phone'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_mypro";  // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to insert data into registered_event table
    $sql = "INSERT INTO registered_event (event_name, applicant_name, applicant_email, applicant_phone)
            VALUES ('$event_name', '$applicant_name', '$applicant_email', '$applicant_phone')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to a confirmation page or show a success message
        echo "<script>alert('Application Submitted Successfully!'); window.location.href='index.php';</script>";
    } else {
        // Handle errors
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>