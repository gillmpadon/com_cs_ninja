const goPage = (str) => window.location.href = `${str}.html`;
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
