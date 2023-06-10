"use strict";
const registro = document.querySelector("#register");

registro.addEventListener("click", () => {
  console.log("registrarse pulsado");

  const alias = document.querySelector("#alias").value;
  const nom = document.querySelector("#name").value;
  const lastName = document.querySelector("#last-name").value;
  const address = document.querySelector("#address").value;
  const tel = document.querySelector("#tel").value;
  const email = document.querySelector("#email").value;
  const terms = document.querySelector("#terms").checked;
  const message = document.querySelector("#message");
  const danger = document.querySelector("#danger");

  const handleClick = async () => {
    if (
      !someInputVal(nom, lastName, address) ||
      !telVal(tel) ||
      !emailVal(email) ||
      !termsCond(terms) ||
      !(await validateAliasEmail(alias, email))
    ) {
      return false;
    }
    danger.style.visibility = "visible";
    danger.style.backgroundColor = "rgb(64, 223, 55)";
    message.textContent = "Registro realizado correctamente";
    setTimeout(() => {
      location.reload();
    }, 5000);

    function someInputVal(nom, lastName, address) {
      if (
        alias.trim().length === 0 ||
        nom.trim().length === 0 ||
        lastName.trim().length === 0 ||
        address.trim().length === 0
      ) {
        danger.style.visibility = "visible";
        message.textContent =
          "Error: alias, nombre, apellidos o dirección sin asignar";
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

    function termsCond(terms) {
      if (terms) return true;
      danger.style.visibility = "visible";
      message.textContent = "Error: debe aceptar los términos";
      return false;
    }

    async function validateAliasEmail(alias, email) {
      const fData = new FormData();
      fData.append("alias", alias);
      fData.append("email", email);

      try {
        const response = await fetch("./validateAliasEmail.php", {
          method: "POST",
          body: fData,
        });

        const data = await response.json();
        console.log("respuesta:" + data);

        if (data === 1) {
          return true;
        } else if (data === -1) {
          danger.style.visibility = "visible";
          message.textContent =
            "Error: Ya existe un usuario con este alias, elija otro";
          return false;
        } else if (data === -2) {
          danger.style.visibility = "visible";
          message.textContent =
            "Ya existe un usuario con este email, elija otro";
          return false;
        }
      } catch (error) {
        // Manejar el error de la solicitud
        console.error(error);
        return false;
      }
    }
  };
  //Cierre de handleClick()
  handleClick();
});
