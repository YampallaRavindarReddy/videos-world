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
$totalduration=round($fileInfo['playtime_seconds']);
$skipseconds=$totalduration-10;
?>

<div class="video-container show">
    <video id="myVideo" width="600" autoplay muted playsinline>
        <source src="ad1.mp4" type="video/mp4">
    </video>
	
	
    <button id="skipButton" onclick="playoriginalvideo()" class="hidden">Skip Video</button>
	<video id="originalvideo" width="600" autoplay muted  class="hidden">
        <source src="advertisement.mp4" type="video/mp4">
    </video>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const video = document.getElementById('myVideo');
    const skipButton = document.getElementById('skipButton');
    const timeToShowButton = <?php echo $skipseconds; // in seconds ?>

    // Add an event listener for the 'timeupdate' event
    video.addEventListener('timeupdate', function() {
        // Check if the current playback time is past the specified time
        if (video.currentTime >= timeToShowButton) {
            // Show the skip button by removing the 'hidden' class
            skipButton.classList.remove('hidden');

            // Remove the event listener to avoid repeated checks
            video.removeEventListener('timeupdate', this);
        }else{
			            skipButton.classList.add('hidden');

			}
    });

    // Add a click event listener to the skip button
    skipButton.addEventListener('click', function() {
        // Skip the video to its end
        video.currentTime = video.duration;
    });
});


function playoriginalvideo(){
	alert('playoriginalvideo');
		//('#originalvideo').show();
            originalvideo.classList.remove('hidden');
            myVideo.classList.add('hidden');
            skipButton.classList.add('hidden');
	       skipButton.classList.remove('newhidden');
		   skipButton.classList.add('newhidden');
		


	}
</script>



<style>
.video-container {
    position: relative; /* Allows positioning of the button */
    width: 100%;
    max-width: 800px;
}

#myVideo {
    width: 100%;
}

#skipButton {
    position: absolute;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: rgba(0, 0, 0, 0.6);
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    z-index: 10; /* Ensure the button is on top of the video */
}

/* Initially hide the button */
.hidden {
    display: none;
}
.newhidden {
    display: none;
}
</style>
