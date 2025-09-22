<?php
require_once 'vendor/autoload.php'; // Or require_once('/path/to/getid3/getid3.php');

$getID3 = new getID3;
$video_file = 'ad1.mp4';
$fileInfo = $getID3->analyze($video_file);

// Check if the analysis was successful
if (isset($fileInfo['playtime_string'])) {
    echo "Video Duration: " . $fileInfo['playtime_string']; // e.g., 1:20
}

// Optional: Get the duration in seconds
if (isset($fileInfo['playtime_seconds'])) {
    echo "<br>Video Duration in Seconds: " . round($fileInfo['playtime_seconds']); // e.g., 13
}
?>
