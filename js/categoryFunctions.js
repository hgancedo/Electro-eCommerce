"use strict";
//Extraemos la url, una parte coincide con el cod de producto
const fileName = location.href.split("/").slice(-1);
console.log(fileName);
//Guardamos el cod de familia
const family = fileName[0].replace(".php", "");

const buttonArray = document.querySelectorAll("#quickView");
console.log(buttonArray);

//Recorremos el conjunto de botones que se generan dinámicamente con php y por cada uno sacamos su valor(idProd) y construimos la url. En esa página de producto, recogeremos los valores con $_GET
buttonArray.forEach((button) => {
  button.addEventListener("click", () => {
    const url = "ITEM" + ".php?famKey=" + family + "&id=" + button.value;
    window.location.href = url;
  });
});
