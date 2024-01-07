<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "fp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Use prepared statement to insert data into the database
$sql = "INSERT INTO customer (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    
    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Use JavaScript to show a pop-up and redirect to the home page
    echo '<script>alert("Message sent successfully!"); window.location.href = "../index.html";</script>';
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the database connection (moved to the success branch)
$stmt->close();
$conn->close();
?>
