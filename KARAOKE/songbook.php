<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songbook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS styles for the song list and notification */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            position: relative;
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }
        
        .song-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .que-list {
            padding: 0;
            margin: 0;
        }

        .song-list li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            cursor: pointer;
        }

        .song-list li:hover {
            background-color: #ccc;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 480px) {
            .song-list li {
                padding: 5px;
            }
        }

        .notification {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            opacity: 0;
            z-index: 101;
            transition: opacity 0.3s ease-in-out;
        }

        .notification.show {
            opacity: 1;
        }
        div.sticky-top {
            position: -webkit-sticky; /* Safari */
            position: sticky;
            top: 0;
            z-index: 100;
            background-color:#1D5D9B;
            color:white;
            padding:5px;
            border-radius:5px;
        }
        div.sticky-bottom  {
            position: -webkit-sticky; /* Safari */
            position: sticky;
            /* bottom: 48px; */
            bottom: 0;
            z-index: 100;
            padding:5px;
            color:black;
            background-color:#1D5D9B;
            border-radius:5px;
        }
        div.sticky-bottom2  {
            position: -webkit-sticky; /* Safari */
            position: sticky;
            bottom: 0;
            z-index: 101;
           
        }
        .line-cd1 {animation:line-cd1-spin 500ms infinite linear; transform-origin: 50px 50px;}
            @keyframes line-cd1-spin {
                100%{transform:rotate(360deg);}
            }
            @media (prefers-reduced-motion: reduce) {
                .line-cd1 {
                    animation: none;
                }
            }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Assuming you have a database connection established
        require_once 'connection.php';
        $roomid = $_POST['roomid'];

        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Fetch the songs from the songbook table
        $query = "SELECT songid,upper(title) Title,upper(artist) Artist,ytid FROM songbook order by Title";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="sticky-top mb-3">
            <h3>Song List</h3>
            <input type="text" id="searchInput" placeholder="Search for a song" class="form-control">
        </div>
        <ul class="song-list list-group" id="songList">
            <?php foreach ($songs as $song): ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <?php echo $song['Title']; ?> - <?php echo $song['Artist']; ?>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="selectSong('<?php echo $song['Title']; ?>', '<?php echo $song['Artist']; ?>', '<?php echo $song['ytid']; ?>')">Add to Playlist</button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="sticky-bottom" onclick="toggleElementVisibility()">
            <div class="sticky-top">
                <h4>Now Playing : 
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 32px; height: 32px;"><g class="line-cd1" style="animation-duration: 0.5s;"><circle class="stroke1 fill1" cx="50" cy="50" r="43" fill="#fff" stroke="#000" stroke-width="2px"></circle><circle class="stroke2 fill2" cx="50" cy="50" r="8" fill="#fff" stroke="#000" stroke-width="2px"></circle><path class="stroke1" d="M17 38.5C17 38.5 19 31.5 25.75 24.75C32.5 18 39.5 16 39.5 16" stroke="#000" stroke-width="2px"></path></g></svg>
                </h4>   
                <h5></h5>
            </div>
        
           <ol type="1" class="que-list list-group" id="quelist" style="display:none" start="1">
            
            </ol>
        </div>
        <!-- <div class="sticky-bottom2">
             <button id="btn-next btn-lg" onclick="fetchNextVideo()" class="btn btn-primary btn-block">Next</button>
        </div> -->
        
    </div>

    <div class="notification" id="notification" onclick="toggleElementVisibility()"></div>

    <script>
         function toggleElementVisibility() {
            var element = document.querySelector('#quelist');
                if (element.style.display === 'none') {
                element.style.display = 'block';
                } else {
                element.style.display = 'none';
                }
        }
        function selectSong(title, artist, ytid) {
            notification.classList.remove("show");
            var urlParams = new URLSearchParams(window.location.search);
            var roomid = urlParams.get('roomid') || 'DEFAULT_ROOM_ID';
            // Handle the selected song here
            console.log("Selected Song:", title, "by", artist);
            console.log("YouTube ID:", ytid,"Roomid:",roomid);
            
            // Make an AJAX request to insert ytid into the playlist table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_playlist.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Show notification when the song is added to the playlist
                    showNotification("Song added to playlist!");
                    fetchPlaying(roomid);
                }
            };
            var data = "ytid=" + encodeURIComponent(ytid)+"&roomid=" + encodeURIComponent(roomid);
            xhr.send(data);
        }
        
        // Client-side search functionality
        var searchInput = document.getElementById("searchInput");
        var songList = document.getElementById("songList");
        var songs = songList.getElementsByTagName("li");

        searchInput.addEventListener("input", function() {
            var searchQuery = searchInput.value.toLowerCase();

            for (var i = 0; i < songs.length; i++) {
                var song = songs[i];
                var songText = song.textContent.toLowerCase();

                if (songText.includes(searchQuery)) {
                    song.style.display = "block";
                } else {
                    song.style.display = "none";
                }
            }
        });
        
        // Function to show notification
        function showNotification(message) {
            var notification = document.getElementById("notification");
            notification.textContent = message;
            notification.classList.add("show");
            
            setTimeout(function() {
                notification.classList.remove("show");
            }, 300);
        }
        function fetchPlaying(roomid) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "fetch_playlist.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var playing = JSON.parse(xhr.responseText);
                    // Handle the fetched playing data here
                    if (playing.length > 0) {
                        // Update the DOM elements with the fetched playing data
                        var playingElement = document.querySelector('.sticky-bottom h5');
                        document.querySelector('.sticky-bottom').style.display = "block";
                        playingElement.textContent = playing[0].Title + " - " + playing[0].Artist;
                        if (playing.length > 1)
                        {
                            var playlistElement = document.getElementById("quelist");
                            // Clear the existing list
                            playlistElement.innerHTML = '';
                            for (var i = 1; i < playing.length; i++) {
                                var song = playing[i];

                                // Create the <li> element with the provided HTML structure
                                var listItem = document.createElement("li");
                                listItem.className = "list-group-item";

                                var divElement = document.createElement("div");
                                divElement.className = "d-flex justify-content-between align-items-center";

                                var innerDiv = document.createElement("div");
                                innerDiv.textContent = i+". "+song.Title + " - " + song.Artist;

                                divElement.appendChild(innerDiv);
                                listItem.appendChild(divElement);

                                playlistElement.appendChild(listItem);
                            }
                        }
                    } else {
                        document.querySelector('.sticky-bottom').style.display = "none";
                    }
                }
            };
            var data = "roomid=" + encodeURIComponent(roomid);
            xhr.send(data);
        }
        function fetchNextVideo(currentplaying) {
            var roomId = urlParams.get('roomid') || 'DEFAULT_ROOM_ID';
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
        // Call the fetchPlaying function when needed, passing the roomid
        var urlParams = new URLSearchParams(window.location.search);
        var roomid = urlParams.get('roomid') || 'DEFAULT_ROOM_ID';
        fetchPlaying(roomid);
    </script>
</body>
</html>

