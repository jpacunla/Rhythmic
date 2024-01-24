<!DOCTYPE html>
<html>
<head>
    <title>Karaoke Welcome Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(Images/karaoke.png);
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;
            color: #fff;
            padding: 200px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
        }
        
        .mini-box-overlay {
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        
        .container {
            z-index: 2;
            margin-bottom: 40px;
            position: relative;
        }
        
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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
        }
        
        .button:hover {
            background-color: #45a049;
        }
        
        .phrases {
            font-size: 20px;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .footer {
            position: relative;
            z-index: 2;
            color: #fff;
            font-size: 14px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .mini-box-overlay:nth-child(1) {
            top: 15%;
            left: 30%;
        }
        
        .mini-box-overlay:nth-child(2) {
            top: 15%;
            right: 30%;
        }
        
        .mini-box-overlay:nth-child(3) {
            bottom: 20%;
            left: 30%;
        }
        
        .mini-box-overlay:nth-child(4) {
            bottom: 20%;
            right: 30%;
        }
        
        .mini-box-overlay:nth-child(5) {
            top: 50%;
            left: 50%;
            width:400px;
            height:300px;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="mini-box-overlay"></div>
    <div class="mini-box-overlay"></div>
    <div class="mini-box-overlay"></div>
    <div class="mini-box-overlay"></div>
    <div class="mini-box-overlay"></div>
    
    <div class="container">
        <h1>Welcome to RhythMic!</h1>
        <div class="phrases">Tap into Your Inner Rhythm at RhythMic!</div>
        <a class="button"  onclick="subscribeToChannel()">Step into the RhythMic Zone</a>
    </div>
    <div class="footer">
        &copy; 2023 Karaoke. All rights reserved
    </div>

    <script>
        function subscribeToChannel() {
            // Replace 'UCwSwKYPqNYeH0QWNntvrvwA' with your YouTube channel ID
            var channelId = 'UCwSwKYPqNYeH0QWNntvrvwA';
            
            // Simulating subscription process...
            // Here, you can add your actual code to subscribe the user to your channel
            
            // Generating a GUID
            var guid = generateGuid();

            // Redirecting the user to karaoke.php with the generated GUID
            window.location.href = 'karaoke.php?roomid=' + guid;
        }

        function generateGuid() {
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                s4() + '-' + s4() + s4() + s4();
        }
    </script>
</body>
</html>
