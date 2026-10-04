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
    <title>User Dashboard - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Welcome to Digital Library</h2>

<p>Welcome, <?php echo $_SESSION["user_name"]; ?>!</p>

<h3>User Dashboard</h3>

<a href="logout.php">Logout</a>

</body>
</html>