"use strict";

//Eliminar producto del carrito
const arrayDeleteProduct = document.querySelectorAll(".delete");
console.log(arrayDeleteProduct);

arrayDeleteProduct.forEach((button) => {
  button.addEventListener("click", () => {
    console.log("borrar pulsado");
    const idProd = button.value;
    console.log(idProd);
    const data = new FormData();
    data.append("remove", idProd);

    fetch("./shopCart.php", {
      method: "POST",
      body: data,
    })
      .then((res) => {
        console.log("respuesta:" + res);
        //recargamos página después de borrar producto de la cesta, para actualizar
        window.location.reload(true);
      })
      .catch((error) => console.log(error));
  });
});
