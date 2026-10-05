<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION["user_id"];
    $seat_id = $_POST["seat_id"];
    $booking_date = $_POST["booking_date"];
    $booking_time = $_POST["booking_time"];

    $sql = "INSERT INTO bookings (user_id, seat_id, booking_date, booking_time)
            VALUES ('$user_id', '$seat_id', '$booking_date', '$booking_time')";

    if ($conn->query($sql) === TRUE) {

        $updateSeat = "UPDATE seats SET status='Booked' WHERE id='$seat_id'";

        if ($conn->query($updateSeat) === TRUE) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Successful - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Booking Successful!</h2>

<p>Your seat has been booked successfully.</p>

<br>

<a href="my_bookings.php">View My Bookings</a><br><br>

<a href="booking.php">Back to Booking</a><br><br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>

<?php
        } else {
            echo "Seat update failed: " . $conn->error;
        }

    } else {
        echo "Booking failed: " . $conn->error;
    }
}
?>