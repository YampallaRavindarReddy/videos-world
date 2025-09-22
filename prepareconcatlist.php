<?php
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
?>