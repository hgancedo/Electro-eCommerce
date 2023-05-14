"use strict";
const acc = document.querySelector("#account");

acc.addEventListener("click", () => {
  console.log("click en mi cuenta");
  const loginModal = document.querySelector("#show-acc");

  if (loginModal.style.visibility === "visible") {
    loginModal.style.visibility = "hidden";
  } else {
    loginModal.style.visibility = "visible";
  }
});
