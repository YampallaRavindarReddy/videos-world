<?php

$input_file = "input.mp4";
$output_file = "output.avi";

// Option 1: Re-encode video and audio
$command = "ffmpeg -i " . escapeshellarg($input_file) . " " . escapeshellarg($output_file);

// Option 2: Copy video and audio streams (if compatible)
// $command = "ffmpeg -i " . escapeshellarg($input_file) . " -vcodec copy -acodec copy " . escapeshellarg($output_file);

// Execute the command
exec($command, $output, $return_var);

if ($return_var === 0) {
    echo "Conversion successful: " . $output_file;
} else {
    echo "Conversion failed. Error output: " . implode("\n", $output);
}

?>