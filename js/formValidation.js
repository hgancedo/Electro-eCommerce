"use strict";
const pagar = document.querySelector("#pagar");

pagar.addEventListener("click", () => {
  console.log("pagar pulsado");

  const nom = document.querySelector("#name").value;
  const lastName = document.querySelector("#last-name").value;
  const address = document.querySelector("#address").value;
  const tel = document.querySelector("#tel").value;
  const email = document.querySelector("#email").value;
  const pay1 = document.querySelector("#payment-1").checked;
  const pay2 = document.querySelector("#payment-2").checked;
  const pay3 = document.querySelector("#payment-3").checked;
  const terms = document.querySelector("#terms").checked;
  const message = document.querySelector("#message");
  const danger = document.querySelector("#danger");

  if (
    !someInputVal(nom, lastName, address) ||
    !telVal(tel) ||
    !emailVal(email) ||
    !payMethod(pay1, pay2, pay3) ||
    !termsCond(terms)
  ) {
    return false;
  }
  danger.style.visibility = "visible";
  danger.style.backgroundColor = "rgb(64, 223, 55)";
  message.textContent = "Pedido realizado correctamente";
  setTimeout(() => {
    document.location.href = "index.php?resetProd=true";
  }, 5000);

  function someInputVal(nom, lastName, address) {
    if (
      nom.trim().length === 0 ||
      lastName.trim().length === 0 ||
      address.trim().length === 0
    ) {
      danger.style.visibility = "visible";
      message.textContent = "Error: nombre, apellidos o dirección sin asignar";
      return false;
    }
    return true;
  }

  function telVal(tel) {
    if (isNaN(tel)) {
      danger.style.visibility = "visible";
      message.textContent = "Error: inserte únicamente números";
      return false;
    } else if (tel.trim().length != 9) {
      danger.style.visibility = "visible";
      message.textContent =
        "Error: la longitud del num de teléfono ha de ser de 9 dígitos";
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
      danger.style.visibility = "visible";
      message.textContent =
        "Error: la longitud de email ha de ser entre 6 y 320 caracteres";
      return false;
      // Validar el formato del email
    } else if (!expresionRegular.test(email)) {
      danger.style.visibility = "visible";
      message.textContent = "Error: formato de email no válido";
      return false;
    }

    return true;
  }

  function payMethod(pay1, pay2, pay3) {
    if (pay1 || pay2 || pay3) return true;
    danger.style.visibility = "visible";
    message.textContent = "Error: seleccione una forma de pago";
    return false;
  }

  function termsCond(terms) {
    if (terms) return true;
    danger.style.visibility = "visible";
    message.textContent = "Error: debe aceptar los términos";
    return false;
  }
});
