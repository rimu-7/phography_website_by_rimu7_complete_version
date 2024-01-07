<?php
// Retrieve comments from the database

$conn = new mysqli("localhost", "root", "1234", "fp");

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

// Display comments
while ($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row['name'] . ":</strong> " . $row['email'] .. $row['message'] "</p>";
}

$conn->close();
?>
