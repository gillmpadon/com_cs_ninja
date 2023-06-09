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

  const audio = document.getElementById('background-music');
  const musicEnabled = localStorage.getItem('isMusicPlaying');
  console.log('isMusicPlaying', musicEnabled);
  if (musicEnabled === 'off') {
    audio.pause(); // Pause the music
  }else{
    audio.play();
  }
