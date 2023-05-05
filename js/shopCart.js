"use strict";
const arrayButtAddCart = document.querySelectorAll(".addToCart");
console.log(arrayButtAddCart);

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
      .then((data) => console.log("respuesta:" + data))
      .catch((error) => console.log(error));
  });
});
