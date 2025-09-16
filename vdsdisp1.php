<?php
// load_data.php

// Database connection (replace with your actual connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videosearchengine";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the offset from the AJAX request (default to 0 for the first load)
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 90; // Number of items to load at a time (multiple of 3 for 3 tds per row)

// Fetch data from your database
$sql = "SELECT id,title, description FROM videos ";//LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$html = '';
if ($result->num_rows > 0) {
    $counter = 0;
    while($row = $result->fetch_assoc()) {
        if ($counter % 3 == 0) {
            // Start a new table row every 3 items
            if ($counter > 0) {
                $html .= '</tr>';
            }
            $html .= '<tr>';
        }
        $html .= '<td>' . htmlspecialchars($row['id']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['title']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['description']) . '</td>';
        $counter++;
    }
    // Close the last row if it's not a multiple of 3
    if ($counter % 3 != 0) {
        $html .= '</tr>';
    }
}

echo $html; // Send the generated HTML back to the client

$conn->close();
?>