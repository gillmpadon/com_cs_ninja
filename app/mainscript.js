const goPage = (str) => window.location.href = `${str}.php`;
const goBack = () => window.history.back();

function togglePasswordVisibility() {
    var passwordInputs = document.querySelectorAll(".password-input");
    passwordInputs.forEach(function (input) {
      if (input.type === "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    });
  }

  //dom
  const audio = document.getElementById('background-music');
  const musicEnabled = localStorage.getItem('isMusicPlaying');
  console.log('isMusicPlaying', musicEnabled);

  //if else
  if (musicEnabled === 'off') {
    audio.pause(); // Pause the music
  }else{
    audio.play();
  }

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
          mainColor = "#D9D9D9";
          containerColor = "#924E4E";
          break;
  }

  document.documentElement.style.setProperty('--main', mainColor);
  document.documentElement.style.setProperty('--container', containerColor);