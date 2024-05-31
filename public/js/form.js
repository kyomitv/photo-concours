document.getElementById("myForm").addEventListener("submit", function (event) {
  const inputs = document.getElementById("myForm").querySelectorAll("input");
  inputs.forEach((ipt) => {
    if (ipt.invalid) {
      usernameInput.classList.add("shake");
      setTimeout(function () {
        usernameInput.classList.remove("shake");
      }, 500);
    }
  });
});
