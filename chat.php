<?php
$host = "localhost"; // or your database host
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "messages"; // your database name

// Create a database connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the content of the message from the POST request
    $content = $_POST["message"];

    // Prepare the SQL statement to insert the message into the database
    $sql = "INSERT INTO messages (content) VALUES (?)";

    // Prepare and bind the parameter to prevent SQL injection
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $content);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Message saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve messages from the database
$sql = "SELECT * FROM messages ORDER BY id ASC";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>" . $row["content"] . "</div>";
    }
} else {
    echo "No messages found";
}

$connection->close();
?>
