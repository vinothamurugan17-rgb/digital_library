<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>All Seat Bookings</h2>

<table border="1" cellpadding="10" cellspacing="0" style="margin:auto; background:white;">

<tr>
    <th>Booking ID</th>
    <th>User</th>
    <th>Seat</th>
    <th>Date</th>
    <th>Time</th>
</tr>

<?php

$sql = "SELECT bookings.id,
               users.name,
               seats.seat_number,
               bookings.booking_date,
               bookings.booking_time
        FROM bookings
        JOIN users ON bookings.user_id = users.id
        JOIN seats ON bookings.seat_id = seats.id
        ORDER BY bookings.id DESC";

$result = $conn->query($sql);

while ($booking = $result->fetch_assoc()) {
?>

<tr>
    <td><?php echo $booking["id"]; ?></td>
    <td><?php echo $booking["name"]; ?></td>
    <td><?php echo $booking["seat_number"]; ?></td>
    <td><?php echo $booking["booking_date"]; ?></td>
    <td><?php echo $booking["booking_time"]; ?></td>
</tr>

<?php
}
?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>