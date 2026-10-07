<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Library - User Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>📚 Digital Library</h2>

<p>Welcome, <strong><?php echo $_SESSION["user_name"]; ?></strong>!</p>

<h3>User Dashboard</h3>

<p>Select an option below:</p>

<a href="booking.php">📖 Book a Seat</a><br><br>

<a href="my_bookings.php">📋 My Bookings</a><br><br>

<a href="logout.php">🚪 Logout</a>

</body>
</html>