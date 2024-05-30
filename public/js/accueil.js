document.querySelectorAll(".rating").forEach((rategp) => {
  //console.log(rategp.childNodes);
  rategp.querySelectorAll("span").forEach((rate, k) => {
    rate.addEventListener("click", () => {
      console.log(
        "clickVote",
        rategp.querySelectorAll("span"),
        `${k + 1}_${rategp.parentElement.id}`
      );

      //Décolorer les étoiles
      rategp
        .querySelectorAll("span")
        .forEach((star) => star.classList.remove("checked"));

      //Colorer les étoiles jusqu'à celle séléctionnée
      for (let i = 0; i <= k; i++) {
        rategp.querySelectorAll("span")[i].classList.toggle("checked");
      }

      //Mettre à jour la BBD
      let obj = {
        vote: k + 1,
        photo: rategp.parentElement.id,
      };
      let params = {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(obj),
      };

      fetch("../../application/controleurs/gestionVotes.php", params)
        .then((response) => response.text())
        .then((res) => (window.location = "./accueil.php"));
    });
  });
});

//.rating > input:checked ~ label {
//  color: #ffa723;
//}
