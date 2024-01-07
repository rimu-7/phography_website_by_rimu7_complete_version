<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="../css/reviews.css">
</head>
<body>

    <div class="comments-container">
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
            
            // Check if a new comment is set in the session
            $new_comment = isset($_SESSION['new_comment']) ? $_SESSION['new_comment'] : '';
            
            // Clear the session variable
            unset($_SESSION['new_comment']);
            
            $sql = "SELECT * FROM comments ORDER BY timestamp DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment-box'>
                            <div class='comment'>
                                <p><strong>{$row['name']}</strong>:</p>
                                <p>{$row['comment']}</p>
                                <p class='timestamp'>{$row['timestamp']}</p>
                            </div>
                        </div>";
                }
            } else {
                echo "<p class='no-comments'>No comments yet.</p>";
            }

            // Display the new comment
            if (!empty($new_comment)) {
                echo "<div class='comment-box new-comment' id='newComment'>
                        <div class='comment'>
                            <p><strong>Your Comment</strong>:</p>
                            <p>{$new_comment}</p>
                        </div>
                    </div>";
            }
        ?>
    </div>
    </div>
    <!-- Sticky Comment Box -->
    <form action="process_comment.php" method="post">
    <div class="review-box">
        <input type="text" name="name" class="name-input" placeholder="Your Name">
        <input type="text" name="comment" class="review-input" placeholder="Your Review">
        <button class="send-button">Send</button>
    </div>

    </form>
    
    
    <script src="../js/popup.js"></script>
</body>
</html>
