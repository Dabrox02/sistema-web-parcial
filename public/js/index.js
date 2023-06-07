import validarLinkActivo from "./active-link.js";

let ls = localStorage;
let d = document;

ls.setItem("active-link", d.title);

d.addEventListener("DOMContentLoaded", (e) => {
  validarLinkActivo();
});

let table = new DataTable("#myTable");
