<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_arm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pose"])) {
    $pose = $_POST["pose"];
    $stmt = $conn->prepare("INSERT INTO arm_status (pose) VALUES (?)");
    $stmt->bind_param("s", $pose);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
