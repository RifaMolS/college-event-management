<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Body styling */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Main content wrapper */
        .content {
            flex: 1;
        }

        /* Form Section */
        .registration-form {
            background: linear-gradient(45deg, #ff7e5f, #feb47b);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
            animation: slideIn 1s ease-out;
        }

        .registration-form h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 1.1rem;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.7);
        }

        /* Button Styling */
        .btn-submit {
            background-color: #ff7e5f;
            color: white;
            border-radius: 30px;
            font-size: 1.2rem;
            padding: 10px 25px;
            transition: transform 0.3s ease, background-color 0.3s ease;
            border: none;
        }

        .btn-submit:hover {
            background-color: #feb47b;
            transform: scale(1.05);
        }

        /* Animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Section */
        footer {
            background-color: #212529;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="content">
        <!-- Event Registration Form -->
        <div class="container">
            <div class="registration-form">
                <h2>Register for the Event</h2>
                <form action="#" method="POST">
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label text-white">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Event Details -->
                    <div class="mb-3">
                        <label for="event_name" class="form-label text-white">Event Name</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter event name" required>
                    </div>

                    <div class="mb-3">
                        <label for="event_date" class="form-label text-white">Event Date</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="event_time" class="form-label text-white">Event Time</label>
                        <input type="time" class="form-control" id="event_time" name="event_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="venue" class="form-label text-white">Event Venue</label>
                        <input type="text" class="form-control" id="venue" name="event_venue" placeholder="Enter event venue" required>
                    </div>

                    <div class="mb-3">
                        <label for="registration_fees" class="form-label text-white">Registration Fees</label>
                        <input type="number" class="form-control" id="registration_fees" name="reg_fee" placeholder="Enter registration fees" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label text-white">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label for="payment" class="form-label text-white">Payment Method</label>
                        <select class="form-control" id="payment" name="pay_method" required>
                            <option value="credit-card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank-transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <!-- Additional Questions -->
                    <div class="mb-3">
                        <label for="dietary_restrictions" class="form-label text-white">Dietary Restrictions</label>
                        <input type="text" class="form-control" id="dietary_restrictions" name="dietary_restrictions" placeholder="Enter any dietary restrictions (optional)">
                    </div>

                    <div class="mb-3">
                        <label for="special_requirements" class="form-label text-white">Special Requirements</label>
                        <input type="text" class="form-control" id="special_requirements" name="special_requirements" placeholder="Enter any special requirements (optional)">
                    </div>
                       
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label text-white" for="terms">I agree to the terms and conditions.</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="register" class="btn btn-submit w-100">Register Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 College Event Management. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
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
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time']; // Get event time
    $event_venue = $_POST['event_venue'];
    $reg_fee = $_POST['reg_fee'];
    $address = $_POST['address'];
    $pay_method = $_POST['pay_method'];
    $dietary_restrictions = $_POST['dietary_restrictions'];
    $special_requirements = $_POST['special_requirements'];
    $password = $_POST['password'];

    // Insert into the event_reg table (Added event_time field)
    $sql = "INSERT INTO event_reg (name, email, phone, event_name, event_date, event_time, event_venue, reg_fee, address, pay_method, dietary_restrictions, special_requirements, password) 
            VALUES ('$name', '$email', '$phone', '$event_name', '$event_date', '$event_time', '$event_venue', '$reg_fee', '$address', '$pay_method', '$dietary_restrictions', '$special_requirements', '$password')";

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
