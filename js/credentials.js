"use strict";
const acc = document.querySelector("#account");

const hasSession = document.querySelector("#hasSession").value;
//Si el valor es false el click funciona para mostrar/ocultar ventana de login
console.log("Hay sesión iniciada? " + hasSession);
//Estamos validando string no boolean
if (hasSession === "false") {
  acc.addEventListener("click", () => {
    console.log("click en Iniciar sesión/desconectarse");

    //Seleccionamos el div que muestra el modal
    const loginModal = document.querySelector("#show-acc");

    if (loginModal.style.visibility === "visible") {
      loginModal.style.visibility = "hidden";
    } else {
      loginModal.style.visibility = "visible";
    }
  });
} else if (hasSession === "true") {
  //Hay usuario logeado y el enlace actuará como boton para logout
  acc.addEventListener("click", () => {
    console.log("Desconectarse");
    //ajax para finalizar session
    const data = new FormData();
    const logout = true;
    data.append("logout", logout);

    fetch("./credentials.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("respuesta:" + data);
        setTimeout(() => location.reload(), 2000);
      });
  });
}
