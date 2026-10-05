<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT bookings.*, seats.seat_number
        FROM bookings
        JOIN seats ON bookings.seat_id = seats.id
        WHERE bookings.user_id = '$user_id'
        ORDER BY bookings.booking_date DESC, bookings.booking_time DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>My Bookings</h2>

<p>Welcome, <?php echo $_SESSION["user_name"]; ?>!</p>

<?php
if ($result->num_rows > 0) {
?>

<table border="1" cellpadding="10" cellspacing="0" style="margin:auto; background:white;">

    <tr>
        <th>Seat Number</th>
        <th>Booking Date</th>
        <th>Booking Time</th>
    </tr>

<?php
    while ($booking = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $booking["seat_number"]; ?></td>
        <td><?php echo $booking["booking_date"]; ?></td>
        <td><?php echo $booking["booking_time"]; ?></td>
    </tr>

<?php
    }
?>

</table>

<?php
} else {
    echo "<p>You have no bookings yet.</p>";
}
?>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>