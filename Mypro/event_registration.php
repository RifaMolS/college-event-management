<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Background Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #90caf9);
            margin: 0;
            padding: 0;
            animation: backgroundAnimation 1.5s ease-in-out infinite alternate;
        }

        /* Container Styling */
        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            animation: fadeIn 1.5s ease-in-out;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: 700;
            animation: fadeIn 1s ease-in-out;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            animation: slideIn 0.8s ease-in-out;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        .btn-custom {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-custom:active {
            background-color: #007bff;
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes backgroundAnimation {
            0% {
                background: linear-gradient(135deg, #e3f2fd, #90caf9);
            }
            100% {
                background: linear-gradient(135deg, #90caf9, #e3f2fd);
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }

            input, select, textarea, .btn-custom {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-calendar-plus"></i> Create Event</h2>
        <form id="eventForm" method="POST" action="">
            <div class="mb-3">
                <label for="eventName">Event Name</label>
                <input type="text" class="form-control" id="eventName" name="event_name" placeholder="Enter the event name" required>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the event" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date">Event Date</label>
                <input type="date" class="form-control" id="date" name="event_date" required>
            </div>

            <div class="mb-3">
                <label for="time">Event Time</label>
                <input type="time" class="form-control" id="time" name="event_time" required>
            </div>

            <div class="mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Event location" required>
            </div>
             
            <div class="mb-3">
            <label for="event-type">Event Type:</label>
            <select id="event-type" name="event_type" required>
                <option value="">--Select Event Type--</option>
                <option value="cultural">Cultural</option>
                <option value="technical">Technical</option>
                <option value="sports">Sports</option>
                <option value="workshop">Workshop</option>
                <option value="seminar">Seminar</option>
                <option value="other">Other</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="coordinator">Organized by (Coordinator Name)</label>
                <input type="text" class="form-control" id="coordinator" name="cord_name" placeholder="Coordinator's name" required>
            </div>

            <div class="mb-3">
                <label for="contact">Contact Information</label>
                <input type="tel" class="form-control" id="contact" name="phone" placeholder="Contact number" required>
            </div>

            <button type="submit" name="create" class="btn btn-custom">Create Event</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['create'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "db_mypro");

    // Retrieve form data
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time']; // Get event time
    $location = $_POST['location'];
    $event_type = $_POST['event_type'];
    $cord_name = $_POST['cord_name'];
    $phone = $_POST['phone'];

    // Insert into the event_reg table (Added event_time field)
    $sql = "INSERT INTO event_registration (event_name, description, event_date, event_time, location, event_type,cord_name, phone) 
            VALUES ('$event_name', '$description', '$event_date', '$event_time', '$location', '$event_type', '$cord_name','$phone')";

    if (mysqli_query($conn, $sql)) {
          echo "Registration successful";
        // Insert into the login table
        //$login_sql = "INSERT INTO login (email, password, status, type) VALUES ('$email', '$password', '1', 'event')";
        
        //if (mysqli_query($conn, $login_sql)) {
            //echo "Registration successful";
        //} else {
            //echo "Error inserting into login table: " . mysqli_error($conn);
        //}
    } else {
        echo "Error inserting into event_reg table: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>