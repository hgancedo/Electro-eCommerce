//TODO: get uds from special input + - on ITEM.php

"use strict";

const arrayButtAddCart = document.querySelectorAll(".addToCart");
console.log(arrayButtAddCart);

arrayButtAddCart.forEach((button) => {
  button.addEventListener("click", () => {
    console.log("click push");
    console.log(button.value);
    //array, con id, nombre_corto y pvp
    const prod = button.value.split("/");
    console.log(prod);
    //el idProd para el id del input
    console.log(prod[0]);
    //seleccionamos el input correspondiente. Cuidado!!!la clase qty, se usa ya en el carrito, pero sin el _id
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
        //recargamos página después de añadir producto para que se muestre el último
        window.location.reload(true);
      })
      .catch((error) => console.log(error));
  });
});
