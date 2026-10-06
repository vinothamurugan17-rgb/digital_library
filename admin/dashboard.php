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
    <title>Admin Dashboard - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Digital Library Admin Dashboard</h2>

<p>Welcome, <?php echo $_SESSION["admin_username"]; ?>!</p>

<h3>Admin Dashboard</h3>

<a href="manage_seats.php">Manage Seats</a><br><br>

<a href="view_bookings.php">View Bookings</a><br><br>

<a href="logout.php">Logout</a>

</body>
</html>