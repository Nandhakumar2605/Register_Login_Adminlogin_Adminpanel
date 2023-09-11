<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connect";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the list of registered clients from the database
$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql);

// Check if there are registered clients
if (mysqli_num_rows($result) > 0) {
    // Display the list of clients in the admin panel
    echo "<h1>Registered Clients</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>name</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No clients registered yet.</p>";
}

// Close the connection
mysqli_close($conn);
?>
