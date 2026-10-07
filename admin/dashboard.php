<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Library - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>📚 Digital Library</h2>

<p>Welcome, <strong><?php echo $_SESSION["admin_username"]; ?></strong>!</p>

<h3>Admin Dashboard</h3>

<p>Select an option below:</p>

<a href="manage_seats.php">💺 Manage Seats</a><br><br>

<a href="view_bookings.php">📋 View Bookings</a><br><br>

<a href="logout.php">🚪 Logout</a>

</body>
</html>