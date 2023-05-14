"use strict";

const arrayButtAddCart = document.querySelectorAll(".addToCart");
console.log(arrayButtAddCart);

//Add producto al carrito
arrayButtAddCart.forEach((button) => {
  button.addEventListener("click", () => {
    console.log("click push");
    console.log(button.value);
    const prod = button.value.split("/");
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
