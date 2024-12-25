<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_mypro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from the modal
    $event_name = $conn->real_escape_string($_POST['event_name']);
    $applicant_name = $conn->real_escape_string($_POST['applicant_name']);
    $applicant_email = $conn->real_escape_string($_POST['applicant_email']);
    $applicant_phone = $conn->real_escape_string($_POST['applicant_phone']);
   // $worker_name = $conn->real_escape_string($_POST['worker_name']);
    //$appointment_date = $conn->real_escape_string($_POST['appointment_date']);
   // $appointment_time = $conn->real_escape_string($_POST['appointment_time']);

    // Insert data into appointments table
    $sql = "INSERT INTO registered_event (event_name, applicant_name, applicant_email, applicant_phone) 
            VALUES ('$event_name', '$applicant_name', '$applicant_email', '$applicant_phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Event registered successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 50px 0;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .card-body {
            background-color: #ffffff;
        }

        .card-body p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .container {
            max-width: 900px;
        }

        .apply-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .apply-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Event Details</h2>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_mypro";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the event_registration table
        $sql = "SELECT * FROM event_registration";
        $result = $conn->query($sql);

        // Check if there are records to display
        if ($result->num_rows > 0) {
            echo "<div class='container mt-4'>";
            // Loop through the records and display each one in a card
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='card mb-4'>
                    <div class='card-header'>
                        <h5>" . $row['event_name'] . "</h5>
                    </div>
                    <div class='card-body'>
                        <p><strong>Description:</strong> " . $row['description'] . "</p>
                        <p><strong>Event Date:</strong> " . $row['event_date'] . " </p>
                        <p><strong>Event Time:</strong> " . $row['event_time'] . " </p>
                        <p><strong>Location:</strong> " . $row['location'] . " </p>
                        <p><strong>Event Type:</strong> " . $row['event_type'] . " </p>
                        <p><strong>Coordinator Name:</strong> " . $row['cord_name'] . " </p>
                        <p><strong>Contact Information:</strong> " . $row['phone'] . " </p>
                        <button class='apply-btn' data-bs-toggle='modal' data-bs-target='#applyModal' data-eventname='" . $row['event_name'] . "'>Apply Now</button>
                    </div>
                </div>";
            }
            echo "</div>";
        } else {
            echo "<p>No records found.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Event Application Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Event Registration Form -->
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="event_name" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="applicant_email" name="applicant_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_phone" class="form-label">Your Phone</label>
                            <input type="tel" class="form-control" id="applicant_phone" name="applicant_phone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to set the event name in the modal
        const applyBtns = document.querySelectorAll('.apply-btn');
        applyBtns.forEach(button => {
            button.addEventListener('click', function () {
                const eventName = this.getAttribute('data-eventname');
                const eventNameInput = document.getElementById('event_name');
                eventNameInput.value = eventName; // Set the event name in the modal form
            });
        });
    </script>
</body>
</html>