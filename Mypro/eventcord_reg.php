<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Coordinator Registration</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://media.gettyimages.com/id/1382269943/photo/group-of-diverse-business-people-on-panel-discussion.jpg?s=612x612&w=gi&k=20&c=LhEGjfA0-soR_nfGKiU6c2NR5jPZT0AJrZyxwHGk2rU=');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Container for the form */
        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly less transparent for better visibility */
            padding: 50px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        /* Form Heading */
        .form-container h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
            letter-spacing: 1px;
        }

        /* Form Inputs */
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="tel"],
        .form-container input[type="date"],
        .form-container select {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Focus State */
        .form-container input:focus, .form-container select:focus {
            border-color: #4CAF50;
        }

        /* Button Styling */
        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        /* Animation for button */
        .form-container button:focus {
            outline: none;
            animation: pulse 0.3s ease;
        }

        /* Form Footer with link */
        .form-container .footer-text {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .form-container .footer-text a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-container .footer-text a:hover {
            text-decoration: underline;
        }

        /* Animation for button click */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Event Coordinator Registration</h3>

        <form action="" method="POST">
            <!-- Name Field -->
            <input type="text" name="name" placeholder="Full Name" required>

            <!-- Email Field -->
            <input type="email" name="email" placeholder="Email Address" required>

            <!-- Phone Number Field -->
            <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required title="Enter a valid 10-digit phone number">

            <!-- Date of Birth -->
            <input type="date" name="dob" placeholder="Date of Birth" required>

            <!-- Gender Dropdown -->
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <!-- Password Field -->
            <input type="password" name="password" placeholder="Create Password" required>

            <!-- Submit Button -->
            <button type="submit" name="register">Register</button>
        </form>

        <!-- Link to Login Page -->
        <div class="footer-text">
            Already have an account? <a href="login.php">Login here</a>.
        </div>
    </div>

</body>
</html>
<?php
if (isset($_POST['register'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "db_mypro");

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob']; 
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    

    // Insert into the event_reg table (Added event_time field)
    $sql = "INSERT INTO event_coordinatoreg (name, email, phone, dob, gender, password) 
            VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Insert into the login table
        $login_sql = "INSERT INTO login (email, password, status, type) VALUES ('$email', '$password', '1', 'event')";
        
        if (mysqli_query($conn, $login_sql)) {
            echo "Registration successful";
        } else {
            echo "Error inserting into login table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into event_reg table: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
