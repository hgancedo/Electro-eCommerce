//script que direcciona a ITEM.php campturando vars necesarias del valor del boton #quickView
"use strict";

//array de botones que contienen los 2 strings, idProd y codFamilia
//No funcionaba bien poniendo el mismo id para todos los botones(obvio) pero con 4 botones, en id=quickView (ITEM.php), sí funciona. Por lo tanto  hemos usado class para seleccionar los botones que se generan en el main carrusel de index.html
//No entiendo por qué se generan 16 botones, si el array está creado con random(6) y estos botones se generan dinamicamente dentro de un foreach, deberían ser 6 botones
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
