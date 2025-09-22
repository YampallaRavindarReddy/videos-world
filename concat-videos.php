<?php
// ... (previous PHP code to create $listFilePath) ...

$videoFiles = [
    'ad1.mp4',
    'ad2.mp4'
	];

$listFilePath = 'concat_list.txt'; // Temporary file for FFmpeg

$fileListContent = '';
foreach ($videoFiles as $file) {
    $fileListContent .= "file '" . addslashes($file) . "'\n";
}

file_put_contents($listFilePath, $fileListContent);


//$outputFile = '/path/to/outputconcatvideo.mp4';
$outputFile = 'outputconcatvideo.mp4';


//$ffmpegPath = '/usr/bin/ffmpeg'; // Adjust this path to your FFmpeg executable

$ffmpegPath = 'C:\ffmpeg\bin'; // Adjust this path to your FFmpeg executable


//$command = "ffmpegPath -f concat -safe 0 -i " . $listFilePath . " -c copy " . $outputFile;
$command = "ffmpeg -f concat -safe 0 -i ".$listFilePath."  -c copy ".time()."concatmergevideo.mp4 ";

exec($command, $output, $returnCode);

if ($returnCode === 0) {
    echo "Videos concatenated successfully to $outputFile\n";
} else {
    echo "Error concatenating videos. FFmpeg output:\n";
    echo implode("\n", $output);
}

// Clean up the temporary list file
unlink($listFilePath);
?> 