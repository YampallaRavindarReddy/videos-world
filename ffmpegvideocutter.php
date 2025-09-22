<?php

require 'vendor/autoload.php';

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Format\Video\X264;

// Replace with your local FFmpeg binary path if not in the system's PATH
$ffmpeg = FFMpeg::create();



// Open the video file to be cut
$video = $ffmpeg->open('input.mp4');

// Define the start and duration for the clip
$start = TimeCode::fromSeconds(10); // Start at 10 seconds
$duration = TimeCode::fromSeconds(5); // Cut a 5-second clip

// Create the video clip
$video_clip = $video->clip($start, $duration);

// Save the new video file with the specified format
$video_clip->save(new X264(), 'output.mp4');

echo "Video successfully cut and saved as output.mp4";



