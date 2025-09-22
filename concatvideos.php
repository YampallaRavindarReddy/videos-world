<?php

$input_file = "mylist.txt";

// Option 1: Re-encode video and audio
// ffmpeg -f concat -safe 0 -i mylist.txt -c copy output.mp4

$command = "ffmpeg -f concat -safe 0 -i ".$input_file."  -c copy ".time()."mergevideo.mp4 ";

// Option 2: Copy video and audio streams (if compatible)
// $command = "ffmpeg -i " . escapeshellarg($input_file) . " -vcodec copy -acodec copy " . escapeshellarg($output_file);

// Execute the command
exec($command, $output, $return_var);

if ($return_var === 0) {
    echo "Conversion successful ";
} else {
    echo "Conversion failed. Error output: " . implode("\n", $output);
}

?>