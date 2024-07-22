<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Appointment";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$doctor = $_POST["doctor"];
$date = $_POST["date"];
$time = $_POST["time"];

// Store the appointment information in the database
$sql = "INSERT INTO appointments (name, email, phone, doctor, date, time)
        VALUES ('$name', '$email', '$phone', '$doctor', '$date', '$time')";

if ($conn->query($sql) === true) {
    echo "Appointment scheduled successfully";
    header('Location:home.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location:bookAppointment.html');
}


?>
