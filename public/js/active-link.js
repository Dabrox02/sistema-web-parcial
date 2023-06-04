let d = document;
let ls = localStorage;

export default function validarLinkActivo() {
  let active = ls.getItem("active-link");
  let links = d.querySelectorAll("[data-link]");
  links.forEach((e) => {
    console.log(e);
    if (e.dataset.link === active) {
      e.classList.add("active");
    } else {
      e.classList.remove("active");
    }
  });
}
