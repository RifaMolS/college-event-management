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

// Prepare and execute the query to fetch user details
$stmt = $conn->prepare("SELECT * FROM user_registration WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user data
$user = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
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
        .profile-details p {
            font-size: 1.1em;
            margin: 10px 0;
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
    <h2>User Profile</h2>
    <?php if ($user): ?>
        <div class="profile-details">
            <p><label>Name:</label> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><label>Address:</label> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><label>Phone Number:</label> <?php echo htmlspecialchars($user['phonenumber']); ?></p>
            <p><label>Email:</label> <?php echo htmlspecialchars($user['address']); ?></p>
            <p><label>Gender:</label> <?php echo htmlspecialchars($user['gender']); ?></p>
            <p><label>College Name:</label> <?php echo htmlspecialchars($user['collegename']); ?></p>
            <input type="button" class="update-button" value="Update" onclick="location.href='update.php'" style="display:block !important;">
        </div>
    <?php else: ?>
        <p>User details not found.</p>
    <?php endif; ?>
</div>

</body>
</html>