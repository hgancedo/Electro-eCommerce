//select login button
const buttlog = document.querySelector("#login");
//seleccionamos el div
const resp = document.querySelector("#resp-login");
//seleccionamos clase css
const respStyle = document.querySelector(".resp-login");
//select login window
const loginWindow = document.querySelector(".show_acc");

buttlog.addEventListener("click", () => {
  console.log("login pulsado");
  const user = document.querySelector("#user").value;
  const pass = document.querySelector("#pass").value;
  const data = new FormData();
  data.append("user", user);
  data.append("pass", pass);

  fetch("login.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("respuesta:" + data[0]);
      loginWindow.style.visibility = "hidden";
      respStyle.style.visibility = "visible";
      resp.textContent = data[0];
      //Si se logea, el 2º elmto del array es true
      if (data[1]) {
        document.querySelector("#isLogged").textContent = user;
        document.querySelector("#account").textContent = "Desconectarse";
        respStyle.style.backgroundColor = "rgb(212, 246, 160)";
      } else {
        respStyle.style.backgroundColor = "rgb(249, 199, 188)";
      }

      setTimeout(() => (respStyle.style.visibility = "hidden"), 5000);
    });

  //form reset
  document.querySelector("#form-login").reset();
});
