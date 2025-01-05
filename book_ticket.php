<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airplane_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$passenger_name = $_POST['passenger_name'];
$email = $_POST['email'];
$flight_number = $_POST['flight_number'];
$seat_number = $_POST['seat_number'];

// Insert data into the database
$sql = "INSERT INTO tickets (passenger_name, email, flight_number, seat_number)
        VALUES ('$passenger_name', '$email', '$flight_number', '$seat_number')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
