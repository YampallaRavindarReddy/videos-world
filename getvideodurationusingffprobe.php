<?php
function getVideoDuration($filePath) {
    // Ensure the ffprobe executable is in your system's PATH or provide the full path
    $command = "ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 " . escapeshellarg($filePath);
    $duration = shell_exec($command);

    if ($duration === null || $duration === false) {
        return false; // Error executing command
    }

    return (float) trim($duration); // Returns duration in seconds
}

$videoFile = 'ad1.mp4';
$durationSeconds = getVideoDuration($videoFile);

if ($durationSeconds !== false) {
    echo "Video duration: " . $durationSeconds . " seconds\n";

    // You can also format it into HH:MM:SS
    $formattedDuration = gmdate("H:i:s", (int)$durationSeconds);
    echo "<br>Formatted duration: " . $formattedDuration . "\n";
} else {
    echo "Could not get video duration.\n";
}
?>