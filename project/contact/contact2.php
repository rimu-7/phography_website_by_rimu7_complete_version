<?php

$conn = new mysqli("localhost", "root", "1234", "fp");

$customer_name = $_POST['id'];
$customer_name = $_POST['name'];
$comment_text = $_POST['email'];
$comment_text = $_POST['message'];

$sql = "INSERT INTO comments (name, emai, message) VALUES ('$customer_name', '$comment_text')";
$conn->query($sql);

$conn->close();
?>
