<?php

require 'vendor/autoload.php';



//$video = $ffmpeg->open('/path/to/main_video.mp4');

$ffmpegPath = 'C:\ffmpeg\bin'; // Adjust this path to your FFmpeg executable


// Define the files to concatenate
$adFile = 'ad1.mp4';
$mainFile = 'ad2.mp4';
$outputFile = time().'output_video_with_ad.mp4';



$command1 = "ffmpeg -i ".$mainFile." -c copy -ss 00:00:20 -t 10 advideo.part1.mp4";

exec($command1, $output, $returnCode);


$command2 = "ffmpeg -i ".$mainFile." -c copy -ss 00:00:20 advideo.part2.mp4";

exec($command2, $output, $returnCode);



// Create a new list file with the ad in the middle
$listContent = "file 'advideo.part1.mp4'\nfile ".$adFile." \nfile 'advideo.part2.mp4'";
file_put_contents('midroll_concat_list.txt', $listContent);


$command3 = "ffmpeg -f concat -safe 0 -i midroll_concat_list.txt -c copy {$outputFile}";
exec($command3, $output, $returnCode);

// Concatenate the parts with the ad







// Clean up temporary files
//unlink("advideo.part1.mp4");
//unlink("advideo.part2.mp4");
?>