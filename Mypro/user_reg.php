<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #90caf9);
            margin: 0;
            padding: 0;
            animation: backgroundAnimation 1.5s ease-in-out infinite alternate;
        }

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

        .mb-3 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><i class="fas fa-user-plus"></i> Student Registration</h2>
        <form id="user_registration" method="post">
            <div class="mb-3">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Enter your address" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="phonenumber">Phone Number</label>
                <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your phone number" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="collegename">College Name</label>
                <input type="text" class="form-control" id="collegename" name="collegename" placeholder="Enter your college name" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
            </div>

            <button type="submit" class="btn btn-custom" name="submit">Register</button>
         </form>

         <!-- Link to Login Page -->
        <div class="footer-text">
            Already have an account? <a href="login.php">Login here</a>.
        </div>
    </div>
   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<?php
if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_mypro");
    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $collegename = $_POST['collegename'];
    $password = $_POST['password'];
    
    // Insert into the user_registration table
    $sql = "INSERT INTO user_registration (name, address, phonenumber, email, gender, collegename, password) 
            VALUES ('$name', '$address', '$phonenumber', '$email', '$gender', '$collegename', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        // Insert into the login table
        $login_sql = "INSERT INTO login (email, password, status, type) VALUES ('$email', '$password', '1', 'user')";
        
        if (mysqli_query($conn, $login_sql)) {
            echo "Registration successful";
        } else {
            echo "Error inserting into login table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into user_registration table: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
