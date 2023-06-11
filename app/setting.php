<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
            session_start();
            require('connection/database.php');
            include("includes/user.php"); ?>
        </div>
        <div class="dashboard">
                <div class="entryDash active" id="menuItem">
                    <p>SETTINGS</p>
                    <svg onclick="goPage('menu')" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024"><path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/></svg>
                </div>
                <div class="entryDash " id="logoutEntry" onclick="goPage('logout')" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10Zm5-6l5-4l-5-4v3H9v2h8v3Z"/></svg>
                    <p>LOGOUT</p>
                </div>
                <div class="entryDash " id="soundEntry">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 512 512"><path fill="currentColor" d="M333.782 80c128 64 128 288 0 352c192-64 192-288 0-352zm-48 16c64 50.843 64 270.217 0 321.06c128-50.843 128-270.217 0-321.06zm-75.13 49.922c-35.468.215-70.268 6.618-89.253 14.863c-14.084 43.136-16.33 127.919-6.736 180.518c-8.452-4.265-18.337-6.543-28.445-6.555c-28.719 0-52 17.909-52 40s23.281 40 52 40s52-17.909 52-40c-6.166-49.187-13.74-115.12-8.225-165.437c37.756-7.722 77.49-17.422 114.688-10.715c-4.152 38.294-3.029 82.424 3.379 117.552c-8.452-4.265-18.337-6.543-28.446-6.554c-28.719 0-52 17.908-52 40c0 22.091 23.281 40 52 40c28.72 0 52-17.909 52-40c-4.618-72.485-18.78-132.767.33-196.436c-18.491-5.267-40.012-7.365-61.293-7.236zm5.456 15.635c11.697-.073 23.313.706 34.174 2.558c-1.185 5.199-2.232 10.67-3.156 16.336c-37.913-5.64-78.578 1.385-114.332 9.656a227.233 227.233 0 0 1 3.277-14.884c19.722-7.718 50.145-13.48 80.037-13.666z"/></svg>
                    <p>SOUND</p>
                </div>
                <?php if($id!=1){ ?>
                <div class="entryDash" onclick="goPage('confirmDelete') ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 256 256"><path fill="currentColor" d="M208 32H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16Zm-26.34 138.34a8 8 0 0 1-11.32 11.32L128 139.31l-42.34 42.35a8 8 0 0 1-11.32-11.32L116.69 128L74.34 85.66a8 8 0 0 1 11.32-11.32L128 116.69l42.34-42.35a8 8 0 0 1 11.32 11.32L139.31 128Z"/></svg>
                    <p>DELETE ACCOUNT</p>
                </div>
                <?php } ?>
        </div>
    </div>
    <audio id="background-music" src="music/bg_music.mp3" loop ></audio>
<script>
    const goPage = (str) => window.location.href = `${str}.php`;
    const goBack = () => window.history.back();

    const soundDiv = document.getElementById('soundEntry');
    const logoutDiv = document.getElementById('logoutEntry');
    const audio = document.getElementById('background-music');
    const isMusic = localStorage.getItem('isMusicPlaying');
    
    function playMusic() {
        audio.play()
            .catch(function(error) {
                console.log('Play error:', error);
            });
    }
    
    function stopMusic() {
        audio.pause();
    }
    
   
        if (isMusic === "on") {
         
            soundDiv.style.backgroundColor = '#352F2F';
            localStorage.setItem('isMusicPlaying', 'on');
        }
    
        function hexToRgb(hexColor) {
    // Remove the "#" character if it exists
    hexColor = hexColor.replace("#", "");

    // Convert the hex color to RGB values
    var r = parseInt(hexColor.substring(0, 2), 16);
    var g = parseInt(hexColor.substring(2, 4), 16);
    var b = parseInt(hexColor.substring(4, 6), 16);

    // Return the RGB color as a string
    return "rgb(" + r + ", " + g + ", " + b + ")";
}
    soundDiv.addEventListener('click', function() {
        if (soundDiv.style.backgroundColor === 'rgb(53, 47, 47)') {
            const nowColor = localStorage.getItem('soundColor');
            soundDiv.style.backgroundColor = nowColor;
            localStorage.setItem('isMusicPlaying', 'off');
            stopMusic();

        } else {
            soundDiv.style.backgroundColor = '#352F2F';
            localStorage.setItem('isMusicPlaying', 'on');
            playMusic();

        }
        console.log('isMusicPlaying ', localStorage.getItem('isMusicPlaying'));
    });
    
    console.log('isMusicPlaying ', localStorage.getItem('isMusicPlaying'));

    const heroColor = localStorage.getItem('avatarHero');
  var mainColor = "";
  var containerColor = "";

  //switch
  switch(heroColor){
      case "1":
          mainColor = "#FF6551";
          containerColor = "#924E4E";
          break;
      case "2":
          mainColor = "#40953F";
          containerColor = "#38713E";
          break;
      case "3":
          mainColor = "#3B4049";
          containerColor = "#2A3331";
          break;
      case "4":
          mainColor = "#267755";
          containerColor = "#245A4E";
          break;
      case "5":
          mainColor = "#9694FB";
          containerColor = "#4A48A6";
          break;
      case "6":
          mainColor = "#E07426";
          containerColor = "#AC6A39";
          break;
      case "7":
          mainColor = "#CB9B27";
          containerColor = "#DB8821";
          break;
      case "8":
          mainColor = "#82B7C2";
          containerColor = "#4B747D";
          break;
      default:
          mainColor = "#FF6551";
          containerColor = "#924E4E";
          break;
  }

  document.documentElement.style.setProperty('--main', mainColor);
  document.documentElement.style.setProperty('--container', containerColor);
  localStorage.setItem('soundColor', containerColor);
</script>


</body>
</html>