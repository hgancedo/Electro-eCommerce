"use strict";
const pagar = document.querySelector("#pagar");

pagar.addEventListener("click", () => {
  console.log("pagar pulsado");

  const nom = document.querySelector("#name").value;
  const lastName = document.querySelector("#last-name").value;
  const email = document.querySelector("#email").value;
  const address = document.querySelector("#address").value;
  const tel = document.querySelector("#tel").value;
  const danger = document.querySelector("#danger");

  if (
    !someInputVal(nom, lastName, address) ||
    !telVal(tel) ||
    !emailVal(email)
  ) {
    return false;
  }

  danger.textContent = "Pedido realizado correctamente";
  danger.style.backgroundColor = "green";
  setTimeout(() => {
    document.location.href = "index.php";
  }, 5000);

  function someInputVal(nom, lastName, address) {
    if (
      nom.trim().length === 0 ||
      lastName.trim().length === 0 ||
      address.trim().length === 0
    ) {
      danger.textContent = "Rellene los campos";
      return false;
    }
    return true;
  }

  function telVal(tel) {
    if (isNaN(tel)) {
      danger.textContent =
        "En el num de teléfono algún caracter insertado no es un número";
      return false;
    } else if (tel.trim().length != 9) {
      danger.textContent =
        "La longitud del num de teléfono ha de ser de 9 dígitos";
      return false;
    }
    return true;
  }

  function emailVal(email) {
    // Expresión regular para validar el formato del email
    const expresionRegular =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    // Verificar la longitud del email
    if (email.length < 6 || email.length > 320) {
      danger.textContent =
        "la longitud de email ha de ser entre 6 y 320 caracteres";
      return false;
      // Validar el formato del email
    } else if (!expresionRegular.test(email)) {
      danger.textContent = "formato de email no válido";
      return false;
    }

    return true;
  }
});
