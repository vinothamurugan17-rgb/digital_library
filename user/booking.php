<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "../config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seat Booking - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Digital Library Seat Booking</h2>

<p>Welcome, <?php echo $_SESSION["user_name"]; ?>!</p>

<h3>Select Your Seat</h3>

<form action="save_booking.php" method="POST">

<?php
$sql = "SELECT * FROM seats WHERE status='Available'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($seat = $result->fetch_assoc()) {

        echo '<button type="button" onclick="selectSeat('
             . $seat["id"] . ', \'' . $seat["seat_number"] . '\')">'
             . $seat["seat_number"] . '</button> ';

    }

} else {
    echo "<p>No seats available.</p>";
}
?>

<input type="hidden" name="seat_id" id="seat_id">

<br><br>

<p id="selectedSeat">No seat selected</p>

<label>Booking Date:</label><br>
<input type="date" name="booking_date" required><br><br>

<label>Booking Time:</label><br>
<input type="time" name="booking_time" required><br><br>

<button type="submit" onclick="return checkSeat()">Confirm Booking</button>

</form>

<p id="message"></p>

<script>
function selectSeat(id, seatNumber) {

    document.getElementById("seat_id").value = id;

    document.getElementById("selectedSeat").innerHTML =
        "Selected Seat: " + seatNumber;
}

function checkSeat() {

    if (document.getElementById("seat_id").value == "") {
        alert("Please select a seat.");
        return false;
    }

    return true;
}
</script>

</body>
</html>

