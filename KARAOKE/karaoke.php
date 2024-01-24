<!DOCTYPE html>
<html>
<head>
    <title>RhythMic Player</title>
    <style>
        /* Optional: Add some basic styling to the page */
        body {
            overflow: hidden; 
            margin:0px;
            font-family: Arial, sans-serif;
            position: relative; /* Add this to make the overlay position relative to the body */
        }
        
        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }
        
        .song-queue {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .song-queue-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .song-queue-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .song-queue-item {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .next-song {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .next-song-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .next-song-info {
            font-size: 18px;
            color: #888;
        }
        
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 18px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        
        .button:hover {
            background-color: #45a049;
        }
        
        iframe {
            width: 99.5vw;
            height: 99.5vh;
            border: 2px solid black;
        }
        
        /* Increase the z-index of the .next-song class */
        .next-song {
            position: absolute;
            z-index: 2;
        }
        
        .videoke-container {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        
        /* QR code overlay styles */
        .qr-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 3;
        }

        .qr-overlay svg {
            max-width: 200px;
            height: auto;
        }

        .qr-overlay h1 {
            color: #fff;
            margin-top: 10px;
        }
        .nowplaying{
            position:fixed;
            color: #fff;
            bottom:0;
            left:10px;
            background-color:#02C39A;
            padding:10px;
            border-radius:5px;
        }
        .onque{
            position:fixed;
            color: #fff;
            bottom:0;
            right:10px;
            background-color:#FF6000;
            padding:10px;
            border-radius:5px;
            z-index: 4;
        }
        .qr-overlayplaying {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            z-index: 3;
        }
        
        .qr-overlayplaying svg {
            max-width: 200px;
            height: auto;
        }
        
        .qr-overlayplaying h1 {
            color: #fff;
            margin-top: 10px;
        }
        #player{
            border:none;
            width:100%;
            height:100vh;
            bottom:0;
            top:0;
            left:0;
            right:0;
        }
    </style>
</head>
<body>
    <div id="player"></div>
    <h3 hidden class="onque" onclick="fetchNextVideo()"></h3>
    <div class="qr-overlay"  onclick="enterFullscreen()">
        <h3 hidden class="nowplaying"></h3>
       
        <div id="qrcode"></div>
        <h1>Scan QR Code to Select Song</h1>
    </div>

    <script src="https://www.youtube.com/player_api"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        var DefaultVid = 'C-a0QzK1DF4';
        var player; // Declare player as a global variable

        // This function will be called when the YouTube API is ready
        function onYouTubePlayerAPIReady() {
            // Create a new YouTube player instance
            player = new YT.Player('player', {
                videoId: DefaultVid, // Replace with your YouTube video ID
                playerVars: {
                    autoplay: 1, // Autoplay the video
                    controls: 0, // Show player controls
                    modestbranding: 1, // Hide YouTube logo
                    rel: 0, // Disable related videos
                    fs: 0, // Enable fullscreen button
                    loop: 1 // Enable video looping
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // This function will be called when the YouTube player is ready
        function onPlayerReady(event) {
            console.log(event.target);
            event.target.playVideo(); // Autoplay the video when the player is ready
        }

        // This function will be called when the YouTube player state changes
        function onPlayerStateChange(event) {
            // You can add logic here based on the player state
            if (event.data == YT.PlayerState.PLAYING) {
                console.log('Video is playing.');
            } else if (event.data == YT.PlayerState.PAUSED) {
                console.log('Video is paused.');
            } else if (event.data == YT.PlayerState.ENDED) {
                console.log('Video playback ended.');
                fetchNextVideo(event.target.playerInfo.videoData.video_id);
            }
        }

        function fetchNextVideo(currentplaying) {
            var xhr = new XMLHttpRequest();

            // Set up the request
            xhr.open('GET', 'fetch_next_video.php?roomid=' + roomId, true);

            // Define what to do when the response is received
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Parse the response JSON
                    var response = JSON.parse(xhr.responseText);

                    if (response.playlistId && response.deletedVideoId) {
                        // Load the new video in the player
                        if(response.nowplaying != ""){
                            document.querySelector('.nowplaying').style.display = "block";
                            document.querySelector('.nowplaying').textContent = "Now Playing : "+response.nowplaying; 
                        }
                        if(response.nextsong != "" && response.nextsong != null){
                            var quetext = "";
                            if(response.songque != 0 && response.songque != '' && response.songque != -1){
                                quetext = " (+"+response.songque+")";
                            }
                            document.querySelector('.onque').style.display = "block";
                            document.querySelector('.onque').textContent = "Next : "+response.nextsong +quetext ;
                        }
                        else{
                            document.querySelector('.onque').style.display = "none";
                            document.querySelector('.onque').textContent = "";
                        }
                        player.loadVideoById(response.deletedVideoId);
                        document.querySelector('.qr-overlay').classList.add('qr-overlayplaying');
                        document.querySelector('.qr-overlay').classList.remove('qr-overlay');
                        
                    } else {
                        // Handle the case when no new video is available
                        if (currentplaying == DefaultVid){
                            player.playVideo(); 
                        }
                        else {
                            player.loadVideoById(DefaultVid);
                        }
                        document.querySelector('.qr-overlayplaying').classList.add('qr-overlay');
                        document.querySelector('.qr-overlayplaying').classList.remove('qr-overlayplaying');
                        document.querySelector('.nowplaying').style.display = "none";
                        document.querySelector('.nowplaying').textContent = "";
                        document.querySelector('.onque').style.display = "none";
                        document.querySelector('.onque').textContent = "";
                    }
                } else {
                    // Handle the error case
                    if (currentplaying == DefaultVid){
                        player.playVideo(); 
                    }
                    else {
                        player.loadVideoById(DefaultVid);
                    }
                    document.querySelector('.qr-overlayplaying').classList.add('qr-overlay');
                    document.querySelector('.qr-overlayplaying').classList.remove('qr-overlayplaying');
                    document.querySelector('.nowplaying').style.display = "none";
                    document.querySelector('.nowplaying').textContent = "";
                    document.querySelector('.onque').style.display = "none";
                    document.querySelector('.onque').textContent = "";
                }
            };

            // Send the request
            xhr.send();
        }
        function stopvideo()
        {

        }

        // Generate a QR code based on the room ID
        function generateQRCode(roomId) {
            var qrCodeElement = document.getElementById('qrcode');
            var qrCode = new QRCode(qrCodeElement, {
                text: "http://192.168.1.5/rhythmic/songbook.php?roomid=" + roomId,
                width: 200,
                height: 200
            });
        }

        function enterFullscreen() {
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                // Enter fullscreen
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) { // Firefox
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) { // Chrome, Safari and Opera
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) { // IE/Edge
                    document.documentElement.msRequestFullscreen();
                }
            } else {
                // Exit fullscreen
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari and Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
            }
        }

        // Get the room ID from the query parameters or use a default value
        var urlParams = new URLSearchParams(window.location.search);
        var roomId = urlParams.get('roomid') || 'DEFAULT_ROOM_ID';

        // Call the function to generate the QR code
        generateQRCode(roomId);

    </script>
</body>
</html>

