import validarLinkActivo from "./active-link.js";
import graficaInicio from "./grafica.js";

let ls = localStorage;
let d = document;
let table = new DataTable("#myTable");

ls.setItem("active-link", d.title);

d.addEventListener("DOMContentLoaded", (e) => {
  validarLinkActivo();
  graficaInicio();
});
