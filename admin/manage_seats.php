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
    <title>Manage Seats - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Manage Library Seats</h2>

<table border="1" cellpadding="10" cellspacing="0" style="margin:auto; background:white;">

    <tr>
        <th>Seat ID</th>
        <th>Seat Number</th>
        <th>Status</th>
    </tr>

<?php

$sql = "SELECT * FROM seats ORDER BY id";
$result = $conn->query($sql);

while ($seat = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $seat["id"]; ?></td>
        <td><?php echo $seat["seat_number"]; ?></td>
        <td><?php echo $seat["status"]; ?></td>
    </tr>

<?php
}
?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>