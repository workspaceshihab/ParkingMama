<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parkingmama";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// collect value of input field
$name = $_REQUEST['name'];
$number = $_REQUEST['vehicle-number'];
$color = $_REQUEST['vehicle-color'];
$type = $_REQUEST['vehicle-type'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

// sql to create table
// $sql = "CREATE TABLE parkingmamadb (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(30) NOT NULL,
//   number VARCHAR(30) NOT NULL,
//   color VARCHAR(50),
//   type VARCHAR(50),
//   email VARCHAR(50),
//   phone VARCHAR(50),
//   status VARCHAR(50),
//   entrytime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";
  
//   if ($conn->query($sql) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }
  



// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO parkingmamadb (name, number, color, type, email, phone, status)  
VALUES ('$name', '$number','$color','$type','$email', '$phone' ,'parked')";

if(mysqli_query($conn, $sql)){

echo "<h3>data stored in a database successfully."

    . " Please browse your localhost php my admin"

    . " to view the updated data or click on home for add more vehicle</h3></br><a style='text-decoration: none;' href='../index.php'>Home</a>"; 
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}
}

// Closing the connection.
$conn->close();
?>