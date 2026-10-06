<?php
session_start();
require_once "../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins
            WHERE username='$username'
            AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $admin = $result->fetch_assoc();

        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_username"] = $admin["username"];

        header("Location: dashboard.php");
        exit();

    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Digital Library</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Digital Library Admin Login</h2>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="POST">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Admin Login</button>

</form>

</body>
</html>