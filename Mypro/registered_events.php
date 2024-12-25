<?php
// Start session to get logged-in user details
session_start();
if (!isset($_SESSION['email'])) {
    die("Access denied! Please log in first.");
}

$email = $_SESSION['email']; // Fetch the user's email from session

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

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM registered_event WHERE id = ? AND applicant_email = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("is", $delete_id, $email); // Use $email for user-specific deletion
    if ($delete_stmt->execute()) {
        echo "<script>alert('Registration deleted successfully!'); window.location.href = 'registered_events.php';</script>";
    } else {
        echo "<script>alert('Error deleting registration.');</script>";
    }
}

// Fetch appointments for the logged-in user
$sql = "SELECT id, event_name, applicant_name, applicant_email, applicant_phone 
        FROM registered_event 
        WHERE applicant_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); // Use $email for fetching appointments
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointments - Servify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 20px;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            max-width: 900px;
        }
        h2 {
            text-align: center;
            color: #007bff;
            font-size: 2rem;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            margin-bottom: 30px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
        }
        .actions {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registered Events</h2>
        <?php if ($result->num_rows > 0): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['event_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['applicant_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['applicant_phone']); ?></td>
                    <td class="actions">
                        <a href="registered_events.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="empty-message">You have no Registration yet. Register one today!</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
