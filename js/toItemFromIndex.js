//script que direcciona a ITEM.php campturando vars necesarias del valor del boton #quickView
"use strict";

//array de botones que contienen los 2 strings, idProd y codFamilia
//No entiendo por qué se generan 16 botones, si el array está creado con
const arrayButton = document.querySelectorAll(".eyeView");
console.log(arrayButton);

arrayButton.forEach((button) => {
  button.addEventListener("click", () => {
    let str = button.value.split("+");
    console.log(str);
    const url = "ITEM" + ".php?famKey=" + str[1] + "&id=" + str[0];
    window.location.href = url;
  });
});
