<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parkingmama";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search         = $conn->real_escape_string($_POST['search']);
$searchTerm     = "%" . $search . "%";
$sql            = "SELECT * FROM parkingmamadb WHERE phone LIKE '$searchTerm'";
$result         = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Search Results:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['phone'] . "</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>
