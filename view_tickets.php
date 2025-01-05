
<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>
<a href="logout.php" class="btn">Logout</a>




<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airplane_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Booked Tickets</h1>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Passenger Name</th>
                <th>Email</th>
                <th>Flight Number</th>
                <th>Seat Number</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['passenger_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['flight_number']}</td>
                        <td>{$row['seat_number']}</td>
                        <td>{$row['booking_date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No tickets booked yet.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
