<?php 
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

$search_term    = isset( $_POST['search'] ) ? $_POST['search'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Form</title>
</head>
<body>
    <h2>Search Users</h2>
    <form action="" method="post">
        <label for="search">Enter username or email:</label>
        <input type="text" id="search" name="search" value="<?php echo $search_term; ?>" required>
        <input type="submit" value="Search">
    </form>

    <br>

    <?php 
    if( ! empty( $search_term ) ) {
        $search         = $conn->real_escape_string($search_term);
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
    }
    ?>


</body>
</html>

<?php
// Close the connection
$conn->close();