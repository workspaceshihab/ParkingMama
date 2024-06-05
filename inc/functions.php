<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parkingmama";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection to MySQL server
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        die("Error creating database: " . $conn->error);
    }

    // Reconnect to the newly created database
    $conn->select_db($dbname);

    // Collect value of input fields
    $name = $_POST['name'];
    $number = $_POST['vehicle-number'];
    $color = $_POST['vehicle-color'];
    $type = $_POST['vehicle-type'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL to create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS parkingmamadb (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        number VARCHAR(30) NOT NULL,
        color VARCHAR(50),
        type VARCHAR(50),
        email VARCHAR(50),
        phone VARCHAR(50),
        status VARCHAR(50),
        entrytime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare an insert statement
    $stmt = $conn->prepare("INSERT INTO parkingmamadb (name, number, color, type, email, phone, status) VALUES (?, ?, ?, ?, ?, ?, 'parked')");
    $stmt->bind_param("ssssss", $name, $number, $color, $type, $email, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h3>Data stored in the database successfully. Please browse your localhost phpMyAdmin to view the updated data or click on home to add more vehicles.</h3></br><a style='text-decoration: none;' href='../index.php'>Home</a>";
    } else {
        echo "ERROR: Data couldn't be stored. " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
