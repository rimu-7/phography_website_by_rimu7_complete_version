<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="messages-container">
        <h2>Customer Messages</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "fp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve messages from the database
        $sql = "SELECT * FROM customer";

        // Check if the 'timestamp' column exists before ordering by it
        if ($conn->query("SHOW COLUMNS FROM customer LIKE 'timestamp'")->num_rows > 0) {
            $sql .= " ORDER BY timestamp DESC";
        }


        $sql = "SELECT * FROM customer ORDER BY timestamp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="customer-table">
                    <tr>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>';
            
            // Check if the 'timestamp' column exists before adding it to the table header
            if ($conn->query("SHOW COLUMNS FROM customer LIKE 'timestamp'")->num_rows > 0) {
                echo '<th>Timestamp</th>';
            }

            echo '</tr>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['NO']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['message']}</td>";

                // Check if the 'timestamp' column exists before adding it to the table row
                if ($conn->query("SHOW COLUMNS FROM customer LIKE 'timestamp'")->num_rows > 0) {
                    echo "<td>{$row['timestamp']}</td>";
                }
            }

            echo '</table>';
        } else {
            echo "<p>No messages yet.</p>";
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <p>&copy;2023 rimu_7, All rights reserved.</p>
    </footer>
</body>
</html>
