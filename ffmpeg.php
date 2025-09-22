<?php

require 'vendor/autoload.php';

use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

// Path to your FFmpeg binary (adjust if necessary)
$ffmpeg = FFMpeg::create([
    'ffmpeg.binaries'  => '/usr/bin/ffmpeg', // or 'C:\ffmpeg\bin\ffmpeg.exe' on Windows
    'ffprobe.binaries' => '/usr/bin/ffprobe', // or 'C:\ffmpeg\bin\ffprobe.exe' on Windows
    'timeout'          => 3600, // The timeout for the underlying process
    'ffmpeg.threads'   => 12,   // The number of threads that FFmpeg should use
]);

$video = $ffmpeg->open('input.mp4');

$format = new X264();
$format->setKiloBitrate(1000);

$video->save($format, 'output.mp4');

echo "Video processed successfully!";

?>