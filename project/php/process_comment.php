<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "fp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$comment = $_POST["comment"];

$sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";

if ($conn->query($sql) === TRUE) {
    // Store the comment in the session
    $_SESSION['new_comment'] = $comment;
    header("Location: comments_page.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


