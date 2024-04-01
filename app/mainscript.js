const goPage = (str) => (window.location.href = `${str}.php`);
const goBack = () => window.history.back();

const eyeClosed = `<svg  id="forgotIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M11.83 9L15 12.16V12a3 3 0 0 0-3-3zm-4.3.8l1.55 1.55c-.05.21-.08.42-.08.65a3 3 0 0 0 3 3c.22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53a5 5 0 0 1-5-5c0-.79.2-1.53.53-2.2M2 4.27l2.28 2.28l.45.45C3.08 8.3 1.78 10 1 12c1.73 4.39 6 7.5 11 7.5c1.55 0 3.03-.3 4.38-.84l.43.42L19.73 22L21 20.73L3.27 3M12 7a5 5 0 0 1 5 5c0 .64-.13 1.26-.36 1.82l2.93 2.93c1.5-1.25 2.7-2.89 3.43-4.75c-1.73-4.39-6-7.5-11-7.5c-1.4 0-2.74.25-4 .7l2.17 2.15C10.74 7.13 11.35 7 12 7"/></svg>`;
const eyeOpen = `<svg id="forgotIcon"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"/></svg>
`;
var isPasswordVisible = true; // Track the state of password visibility
const forgotIcon = document.querySelector('#forgotIcon')
const passwordInput = document.querySelector('.password-input')
forgotIcon.addEventListener('click', function() {
  // Toggle password visibility
  isPasswordVisible = !isPasswordVisible;

  // Change the SVG based on password visibility state
  if (isPasswordVisible) {
    forgotIcon.innerHTML = eyeClosed
    passwordInput.type = "password";
    console.log("aaaa")
  } else {
    forgotIcon.innerHTML = eyeOpen
    passwordInput.type = "text";
    console.log("bbbb")
  }
});


//dom
const audio = document.getElementById("background-music");
const musicEnabled = localStorage.getItem("isMusicPlaying");
console.log("isMusicPlaying", musicEnabled);

//if else
if (musicEnabled === "off") {
  audio.pause(); // Pause the music
} else {
  audio.play();
}

const heroColor = localStorage.getItem("avatarHero");
var mainColor = "";
var containerColor = "";

//switch
switch (heroColor) {
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

document.documentElement.style.setProperty("--main", mainColor);
document.documentElement.style.setProperty("--container", containerColor);
