<?php
// Start the session
session_start();

// Include the database connection file
include('dbconnect.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    echo "<script>location.href='login.php'</script>";
    exit();
}

// Retrieve the email of the logged-in user from the session
$email = $_SESSION['email'];

// Prepare and execute the query to fetch current user details
$stmt = $conn->prepare("SELECT * FROM user_registration WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user data
$user = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Check if the form was submitted to update profile details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $collegename = $_POST['collegename'];

    // Update the user details in the database
    $update_sql = "UPDATE user_registration SET name=?, email=?, phonenumber=?, address=?, gender=?, collegename=? WHERE email=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssss", $name, $email, $phonenumber, $address, $gender, $collegename, $_SESSION['email']);
    
    if ($stmt->execute()) {
        // If the update is successful, show a success message
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile. Please try again.');</script>";
    }

    // Close the statement
    $stmt->close();
    
    // Refresh the page to load updated details
    echo "<script>location.href='my_profile.php'</script>";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            width: 50%;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .profile-container h2 {
            text-align: center;
            color: #2575fc;
        }
        .profile-details {
            margin-top: 20px;
        }
        .profile-details label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .profile-details input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .update-button {
            display: block;
            width: 150px;
            padding: 8px;
            margin: 20px auto;
            text-align: center;
            background: #ff6347;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .update-button:hover {
            background: #ff4500;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Update Profile</h2>
    <form action="update.php" method="POST">
        <div class="profile-details">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="phonenumber">Phone Number:</label>
            <input type="text" id="phonenumber" name="phonenumber" value="<?php echo htmlspecialchars($user['phonenumber']); ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>" required>

            <label for="collegename">College Name:</label>
            <input type="text" id="collegename" name="collegename" value="<?php echo htmlspecialchars($user['collegename']); ?>" required>

            <input type="submit" class="update-button" value="Update Profile" required>
            <input type="button" class="update-button" value="Back" onclick="location.href='user_home.php'" required>
        </div>
    </form>
</div>

</body>
</html>