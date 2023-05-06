//TODO: get uds from special input + - on ITEM.php

"use strict";

const arrayButtAddCart = document.querySelectorAll(".addToCart");
console.log(arrayButtAddCart);

arrayButtAddCart.forEach((button) => {
  button.addEventListener("click", () => {
    console.log("click push");
    console.log(button.value);
    const prod = button.value.split("/");
    console.log(prod);
    //el idProd para el id del input
    console.log(prod[0]);
    //seleccionamos el input correspondiente
    const idInput = ".qty_" + prod[0];
    console.log(idInput);
    const inputValue = document.querySelector(idInput).value;

    console.log("valor del input:" + inputValue);

    //Insertamos el valor al final del array
    prod.push(inputValue);
    console.log(prod);

    const data = new FormData();

    data.append("prod", prod);

    fetch("./shopCart.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("respuesta:" + data);
      })
      .catch((error) => console.log(error));
  });
});
